<?php


	class Saida {

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


	     public function sair($km,$dat,$tim,$id,$Id_usuario,$condutor){


	     		 $sql = $this->pdo->prepare("INSERT INTO entregas (KM_INICIAL,DATA_INICIAL,HR_INICIAL,FK_IN_Cadcarros,FK_ID_usuario,condutor) VALUES (:k,:d,:t,$id,$Id_usuario,:c)");

	     		 $sql2 = $this->pdo->prepare("UPDATE cadcarros SET status = 0 WHERE :i = ID_Cadcarros");
	     		 $sql2->bindValue(":i",$id);

	     		 $sql2->execute();
	     		 $sql->bindValue(":k",$km);
	     		
	     		 $sql->bindValue(":d",$dat);
	     		
	     		 $sql->bindValue(":t",$tim);

	     		 $sql->bindValue(":c",$condutor);

	     		 $sql->execute();

	     		 return true;

	     } 



	    public function selecionar(){


	    	$sql = $this->pdo->prepare("SELECT ID_Cadcarros,Modelo FROM cadcarros WHERE status = 1");

	    	$sql->execute();

	    	$cars = $sql->fetchAll();
	    
	    	return $cars;

	    }

	}

		



?>