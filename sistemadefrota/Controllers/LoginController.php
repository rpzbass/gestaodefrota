<?php

		namespace  Controllers;


		class LoginController


		{


			private $loadfile;

			public function __construct(){

				$this->loadfile = new \Views\MainView('login');

			}
			public function executar(){

				$this->loadfile->render();

			}


		}





?>