<?php

	namespace Views;

	class TesteView

	{

		private $loadfile;

		public function __construct($loadfile){

			$this->loadfile = $loadfile;
		}


		public function render(){

			include('pages/'.$this->loadfile.'.php');
		}


	}




?>