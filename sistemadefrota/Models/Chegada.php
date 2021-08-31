<?php

	
	class Chegada {




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


	     public function teste(){


	     	echo "classe instanciada";
	     }


	     public function chegou($km_f,$dat_f,$tim_f){
	     			$usuario = $_SESSION['ID_usuario'];

	     			$sql = $this->pdo->prepare("UPDATE entregas SET KM_FINAL = :k,DATA_FINAL = :d,HR_FINAL = :h WHERE KM_FINAL = 0 AND FK_ID_usuario = :u"); 
				
				 	
	     		 	$sql->bindValue(":u",$usuario);	
	     			$sql->bindValue(":k",$km_f);

	     			$sql->bindValue(":d",$dat_f);

	     			$sql->bindValue(":h",$tim_f);
				
	     			$sql->execute();

	     			return true;	
	     }


	     public function cardisponivel($id){

         	     	$sql = $this->pdo->prepare("UPDATE cadcarros SET status = 1 WHERE :i = ID_Cadcarros");
	     		 	
	     		 	$sql->bindValue(":i",$id);

	     		 	$sql->execute();


	     }

	     public function veiculoatual(){

	     		$usuario = $_SESSION['ID_usuario'];

	     		$sql = $this->pdo->prepare('SELECT FK_IN_Cadcarros FROM entregas WHERE FK_ID_usuario = :u AND KM_FINAL = 0');
	     		$sql->bindValue(":u",$usuario);
	     		$sql->execute();

	     		$ID_atual = $sql->fetch();
	     		return $ID_atual;


	     }




	     public function corrida(){

	     			$usuario = $_SESSION['ID_usuario'];

	     			$sql = $this->pdo->prepare("SELECT KM_FINAL FROM entregas WHERE KM_FINAL = 0 AND  FK_ID_usuario = $usuario");	

	     			$sql->execute();

	     			if($sql->rowCount() > 0){

	     				return true;

	     			}else{

	     				return false;

	     			}


	     }







	}


?>