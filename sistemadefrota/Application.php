<?php
	
   define('INCLUDE_PATH','http://192.168.1.105/sistemadefrota/');
	define('INCLUDE_PATH_FULL','http://192.168.1.105/sistemadefrota/Views/pages/');


	class Application

	{

		public function executarApp(){

				$url = isset($_GET['url']) ? explode('/', $_GET['url'])[0]: 'Home';
				
				$url = ucfirst($url)."Controller";
				
				
				
				if(file_exists('Controllers/'.$url.'.php')){

						


						$class = 'Controllers\\'.$url;
						
						//echo 'Carregando Classe: '.$url;
						$controller = new $class();
						$controller->executar();
				}else{

						
						die("Não existe esse controlador");
				
				}


			}
		}



?>