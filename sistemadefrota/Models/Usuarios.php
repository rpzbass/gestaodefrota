<?php 

	class  Usuarios  {

			private $pdo;
			public $msgError;

		    public function conectar($server,$dbname,$usuario,$senha){
	     	try{	
	    

	    	 		 $this->pdo = new PDO("mysql:host=$server;dbname=$dbname",$usuario,$senha);	
	  
	    	 		 $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	    		 }catch(PDOException $e){


	    		 		$msgError = $e->getMessage();

	    		 		echo $msgError;


	     		}




	     }






			public function logar($email,$senha){

					$sql = $this->pdo->prepare("SELECT ID_usuario,nome FROM usuarios WHERE email = :e AND senha = :s");

					$sql->bindValue(":e",$email);

					$sql->bindValue(":s",md5($senha));

					$sql->execute();

					if($sql->rowCount() > 0){

						$dado = $sql->fetch();
						session_start();

						$_SESSION['ID_usuario'] = $dado['ID_usuario'];

						$_SESSION['nome'] = $dado['nome'];	

						return true;
					}else {


						return false;


					}


			}


			public function cadastrar($nome,$email,$senha){

					$sql = $this->pdo->prepare("SELECT email FROM usuarios WHERE email = :e");
				
					$sql->bindValue(":e",$email);
				
					$sql->execute();

				
				if($sql->rowCount() > 0){

					return false;

				}else{


					$sql = $this->pdo->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (:n,:e,:s)");
					
					$sql->bindValue(":n",$nome);
				
					$sql->bindValue(":e",$email);
				
					$sql->bindValue(":s",md5($senha));

					$sql->execute();

					return true;
				
				}



			}








	}




?>