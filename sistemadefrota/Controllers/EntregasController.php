<?php

	namespace Controllers;

	class EntregasController

	{

   		  private $view;


		   public function __construct(){

		   		$this->view = new \Views\MainView('entregas');

		   }

		   public function executar(){

		   		$this->view->render(array('titulo'=>'Entregas'));

		   }





	}





?>