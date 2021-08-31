<?php 
		

		namespace Controllers;

		
		class CadcarrosController 

		{

		
		     
			private $view;
			//private $model;	

			

			public function __construct(){


				$this->view = new \Views\MainView('cadcarros');
				//$this->model = new \Models\Cadcarros();

			}




			public function executar(){


				$this->view->render(array('fruta'=>'abacaxi'));


			}



			public function cadastrar(){
				 

				 $this->cad = new Cadcarros;

				 $this->cad->cadastrar($modelo,$placa,$odometro);


			}


		}






?>