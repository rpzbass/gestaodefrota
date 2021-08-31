


<!DOCTYPE html>

<head>
	
	<meta charset="utf-8">
	<link href="<?php echo INCLUDE_PATH_FULL?>css/bootstrap.css" rel="stylesheet" type="text/css">
  
	<title><?php echo self::titulo;?></title>

</head>
<body>
	<header>
		<div class="center">
			<div class="logo">
				
			</div><!--logo-->
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  				<a class="navbar-brand" href="#">KM CONTROL</a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
   				 <span class="navbar-toggler-icon"></span>
  				</button>
  				<div class="collapse navbar-collapse" id="navbarCollapse">
   					 <ul class="navbar-nav mr-auto">
      					<!--<li class="nav-item active">
       						 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    					</li>
     					 <li class="nav-item">
      					  	<a class="nav-link" href="#">Entregas</a>
     				 	</li>-->



					<?php  
            
           session_start();

           if($_SESSION['ID_usuario'] == 6 ){

              array_push($this->menuItems,'Cadusuarios');
           }
       
           foreach($this->menuItems as $key => $value){


     				 	 
      					  echo 	'<li class="nav-item"><a class="nav-link" href="'.strtolower($value).'">&nbsp;'.$value.'&nbsp;</a></li>';
     				 	 

     					 
     				} 



            ?> 




               
    				</ul>
    			     
 				   
 				</div>
         <div  class="nav-item" style="float:right;text-align:center;display:inline-block; margin-right: 5%;color:gray; "><a class="nav-link navbar-item" style="color:yellow;" href="?logout">Logout <?php    echo " : : ".$_SESSION['nome']; ?></a></div>
			</nav>
		</div><!--center-->
	</header>
	