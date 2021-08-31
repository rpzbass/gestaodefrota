<?php 

		
	Class  Entregas {



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




			public function listarentregas(){

				$sql = $this->pdo->prepare("SELECT * FROM entregas");

				$sql->execute();


				$listar = $sql->fetchAll();


				return $listar;


			}	

















	}


?>