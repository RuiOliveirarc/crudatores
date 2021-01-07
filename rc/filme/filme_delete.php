<?php
	$idFilme=$_GET['id_filme'];
	$con=new mysqli("localhost","root","","filmes");

	if ($con->connect_errno!=0) {
			echo "Ocorreu um erro no acesso à base de dados. <br>" .$con->connect_error;
			exit;
	}
	else{

		$sql = "Delete From filmes where id_filme=?";
		$stm=$con->prepare($sql);

		if($stm!=false){

			$stm->bind_param("i",$idFilme);
			$stm->execute();
			$res=$stm->get_result();
			$stm->close();

			echo '<script>alert("Filme eliminado com sucesso");</script>';
			echo 'Aguarde um momento. A reencaminhar página';
			header("refresh:2;url=index.php");
		}
		else{
		}
	}
		
?>