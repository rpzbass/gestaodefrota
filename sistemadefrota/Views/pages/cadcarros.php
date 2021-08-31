<?php
        
                if(!isset($_SESSION['ID_usuario'])){

              header('Location: '.INCLUDE_PATH.'login');
              exit();
          
         
        }
         if(isset($_GET['logout'])){

                    
                    session_destroy();
                    sleep(1);
                    header('Location: '.INCLUDE_PATH.'login');

                  }

        

        if(!isset($_SESSION['ID_usuario'])){

              header('Location: '.INCLUDE_PATH.'login');
              exit();
          
         
        } 

           if(isset($_GET['logout'])){

                    
                    session_destroy();
                    sleep(1);
                    header('Location: '.INCLUDE_PATH.'login');

                  }

      require_once 'Models/Cadcarros.php'; 

      $u = new Cadcarros();

    
          
   

?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL?>css/bootstrap.min.css" >

    <title>Hello, world!</title>
  </head>
  <body>
      
        <div style="margin: 70px auto; width: 60%; position: relative; text-align: center;">
      
    <form method="POST">
	
		<h2 style="margin: 40px">CADASTRO CARROS</h2>
  <div class="form-group" >
    <label for="exampleInputEmail1">MODELO</label>
    <input type="text" class="form-control" name="modelo" style="text-align: center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ex::Marea">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PLACA</label>
    <input type="text" class="form-control" name="placa" style="text-align: center" id="exampleInputPassword1" placeholder="Placa do veiculo">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">ODOMETRO</label>
    <input type="number" class="form-control center" name="odometro" style="text-align: center" id="exampleInputPassword1" placeholder="Km do Veiculo">
  </div>
  

  <input type="submit" style="width: 70%" class="btn btn-primary" value="Cadastrar">
  
</form >
  </div>

<?php
      
      if(isset($_POST['modelo'])){

          $modelo = $_POST['modelo'];
          $placa  = $_POST['placa'];
          $odometro = $_POST['odometro'];

      
        if(!empty($modelo) && !empty($placa) && !empty($odometro)){

               $u->conectar("127.0.0.1","root","");
                
                if($u->msgErro == ""){

                     if($u->cadastrar($modelo,$placa,$odometro)){

                            echo "<h3 style=\"text-align:center;\">Veiculo Cadastrado com sucesso</h3>";

                      }else{

                            echo "Veiculo já está cadastrado no sistema!!!";
                     }

                }else{

                    echo "Erro".$u->msgErro;



                }
            
        }else{

            echo  "Prencha todos os Campos Chocochoy";

            

        }

      }





?>



 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
