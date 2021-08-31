<?php

	namespace Controllers;


	class CadusuariosController 
	{


		private $view;


		public function __construct(){

		    $this->view = new \Views\MainView('cadusuarios');


		}


		public function executar(){


			 $this->view->render(array('titulo'=>'cadusuarios'));

		}





	}




?>