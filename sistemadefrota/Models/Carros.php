<?php

	class Carros
	 {

	 		public $pdo;
			public $msgErro = "";
			

			public 	function conectar($servername, $usuario, $senha){
					try {
  					$this->pdo = new PDO("mysql:host=$servername;dbname=km_control", $usuario, $senha);
  
  					$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  					
  							echo "Connectado com sucesso";
				
					} catch(PDOException $e) {
 							
 							$msgErro = $e->getMessage();
							echo $msgErro;
					}
				
				
			}





			

            public $list;
			public function listar(){

				$sql = $this->pdo->prepare("SELECT Modelo,Placa,Odometro FROM cadcarros");
				$sql->execute();

				$list = $sql->fetchAll();

					return $list;
									
				}

				
			}






	



?>