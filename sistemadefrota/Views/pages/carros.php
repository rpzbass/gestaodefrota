
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


      require_once 'Models/Carros.php';

      $cars = new Carros();

      
      $cars->conectar("127.0.0.1","root","");

    $list = $cars->listar();
?>



<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL?>css/bootstrap.min.css">
    <style>
      table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          position: center;
          border-radius: 7px;
          }

        .a{

          margin: 70px auto;
          text-align: center; 
          width: 85%; 

        }

        td, th {
          
           border-radius: 7px;
          padding: 4px;
          text-align: center; 
            }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
    <title><?php echo $this->titulo ; ?></title>
  </head>
  <body>
  		
      	<div class="a">

            <h3 sytle="text-align:center;">Veiculos</h3>
            <div><table>
              <tr><th style="background-color: orange;">MODELO</th><th style="background-color: #3973ac">PLACA</th><th style="background-color:#b3cce6;">KM RODADOS</th></tr>
                <?php  foreach($list as $key => $value){
                  if($key % 2 == 0){
                  echo "<tr style='background-color:gray;border-radius: 7px;'><td>".$value['Modelo']."</td><td>".$value['Placa']."</td><td>".$value['Odometro']."</tr>";

                  }else{

                     echo "<tr><td>".$value['Modelo']."</td><td>".$value['Placa']."</td><td>".$value['Odometro']."</tr>";
                    
                  } 


                
              }


                ?>
  		    </table></div>
        </div>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>