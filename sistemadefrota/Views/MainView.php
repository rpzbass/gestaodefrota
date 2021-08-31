<?php
	 
    
	 namespace Views;

	 class MainView

	 {
	 		private $fileName;
	 		private $header;
	 		private $footer;

	 		const  titulo = 'KM CONTROL';
	 		//private $teste = 'teste008';
	 		public $menuItems = array('Home','Entregas','Carros','Cadcarros');
	 		
	 			

	 			

	 				

	 			


		 		public function __construct($fileName,$header='header',$footer='footer'){

	 				$this->fileName =$fileName;
	 				$this->header = $header;
	 				$this->footer = $footer;

	 			}

	 			public function render($arr=[]){
	 				if($this->fileName == 'login'){
	 				    

	 					include('pages/'.$this->fileName.'.php');
	 					include('pages/templates/'.$this->footer.'.php');

	 			
	 				}else{
	 					
	 					include('pages/templates/'.$this->header.'.php');
	 					include('pages/'.$this->fileName.'.php');
	 					include('pages/templates/'.$this->footer.'.php');
	 					
	 			}

		 }

}

?>