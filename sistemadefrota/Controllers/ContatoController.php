<?php

		
		namespace Controllers;

		class ContatoController 
		{

			private $view;

			/*public function __construct(){

				$this->view = new \Views\MainView('contato');

			}
	   		*/

	   		public function executar(){


	   			\Router::rota('areaprivada',function(){
	   				



	   				$this->view = new \Views\MainView('areaprivada');
	   				$this->view->render(array('titulo'=>'contato2'));

	   			});
	   				
	   		
	   				
		
			}
	
		}



?>