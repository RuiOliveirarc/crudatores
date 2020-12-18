<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$nome='';
		$data_nacimento='';
		$nacionalidade='';
		

		if(isset($_POST['nome'])){

			$nome=$_POST['nome'];
		}
		else{
			echo '<script>alert("É obrigatorio o preenchimento do nome.");</script>';
		}
		if (isset($_POST['data_nacimento'])) {
			$data_nacimento=$_POST['data_nacimento'];
		}
		if (isset($_POST['nacionalidade'])) {
			$nacionalidade=$_POST['nacionalidade'];	
		}
		$con=new mysqli("localhost","root","","filmes");

		if ($con->connect_errno!=0) {
			echo "Ocorreu um erro no acesso à base de dados. <br>" .$con->connect_error;
			exit;
		}

		else{
			$idAtor=$_GET['id_ator'];
			$sql="update atores set nome=?, data_nascimento=?, nacionalidade=? where id_ator=?";
			$stm=$con->prepare($sql);
			if($stm!=false){

				$stm->bind_param('sssi',$nome,$data_nacimento,$nacionalidade,$idAtor);
				$stm->execute();
				$stm->close();

				echo '<script>alert("Ator editado com sucesso");</script>';
				echo 'Aguarde um momento. A reencaminhar página';
				header("refresh:2;url=index.php");
			}
			else{
			}
		}
	}
	else{
		echo "<h1>Houve um erro ao processar o seu pedido<br>Irá ser reencaminhada</h1>";
		header("refresh:2;url=index.php");
	}
?>