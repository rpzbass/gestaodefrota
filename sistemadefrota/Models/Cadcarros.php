<?php
	
	
	class Cadcarros 
	
	{


			public $pdo;
			public $msgErro = "";
			

			public 	function conectar($servername, $usuario, $senha){
					try {
  					$this->pdo = new PDO("mysql:host=$servername;dbname=km_control", $usuario, $senha);
  
  					$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  					
  							
				
					} catch(PDOException $e) {
 							
 							$msgErro = $e->getMessage();
							echo $msgErro;
					}
				
				
			}




			public function cadastrar($modelo,$placa,$odometro){

					$sql = $this->pdo->prepare("SELECT ID_Cadcarros FROM cadcarros WHERE Placa = :p");
				
					$sql->bindValue(":p",$placa);
				
					$sql->execute();

				
				if($sql->rowCount() > 0){

					return false;

				}else{


					$sql = $this->pdo->prepare("INSERT INTO cadcarros (modelo,placa,odometro,status) VALUES (:m,:p,:o,1)");
					
					$sql->bindValue(":m",$modelo);
				
					$sql->bindValue(":p",$placa);
				
					$sql->bindValue(":o",$odometro);

					$sql->execute();

					return true;
				
				}



			}



	
	}



?>