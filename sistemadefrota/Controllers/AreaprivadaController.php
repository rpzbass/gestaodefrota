<?php 


	namespace Controllers;

	class AreaprivadaController 
	
	{

		private $view;


		public function __construct(){


			$this->view = new \Views\MainView('areaprivada');


		} 


	


		public function executar(){

			$this->view->render(array('titulo'=>'carros'));

		}




	}





?>