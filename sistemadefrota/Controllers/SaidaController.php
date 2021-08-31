<?php

		
		namespace Controllers;

		class SaidaController extends Controller
		{

			private $view;

			public function __construct(){

				$this->view = new \Views\MainView('home');

			}
	   	

	   		public function executar(){
				$this->view->render(array('titulo'=>'SAIDA'));
		
			}
	
		}



?>