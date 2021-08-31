<?php 


	namespace Controllers;

	class CarrosController 
	
	{

		private $view;


		public function __construct(){


			$this->view = new \Views\MainView('carros');


		} 


	


		public function executar(){

			$this->view->render(array('titulo'=>'carros'));

		}




	}





?>