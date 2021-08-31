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





        require_once 'Models/Entregas.php';


        $E = new Entregas();

        $E->conectar('127.0.0.1','root','');

        $listar = $E->listarentregas();

        if(!isset($_SESSION['ID_usuario'])){

              header('Location: '.INCLUDE_PATH.'login');
              exit();
          
         
        } ?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL?>css/bootstrap.min.css" >
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
    <title>Hello, world!</title>
  </head>
  <body>
  		
      	<div class="a">


            <div><table>
              <tr><th style="background-color: orange;">CONDUTOR</th><th style="background-color: #3973ac">DATA</th><th style="background-color: #3973ac;">HORA INICIAL</th><th style="background-color: #3973ac;">KM INICIAL</th><th style="background-color:#b3cce6;">DATA</th><th style="background-color: #b3cce6;">HORA FINAL</th><th style="background-color:#b3cce6;">KM FINAL</th></tr>
                <?php foreach($listar as $key => $value){
                  if($key % 2 == 0){
                  echo "<tr style='background-color:gray;border-radius: 7px;'><td>".$value['condutor']."</td><td>".implode('-',array_reverse(explode('-',$value['DATA_INICIAL'])))."</td><td>".$value['HR_INICIAL']."</td><td>".$value['KM_INICIAL']."</td><td>".implode('-',array_reverse(explode('-',$value['DATA_FINAL'])))."</td><td>".$value['HR_FINAL']."</td><td>".$value['KM_FINAL']."</td></tr>";

                  }else{

                    echo "<tr><td>".$value['condutor']."</td><td>".implode('-',array_reverse(explode('-',$value['DATA_INICIAL'])))."</td><td>".$value['HR_INICIAL']."</td><td>".$value['KM_INICIAL']."</td><td>".implode('-',array_reverse(explode('-',$value['DATA_FINAL'])))."</td><td>".$value['HR_FINAL']."</td><td>".$value['KM_FINAL']."</td></tr>";


                  }
                
              }

                ?>

                

                

  		    </table></div>
        </div>  
        <div style="text-align: center;"><button style="text-align: center;" onclick="window.print()">IMPRIMIR</button></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>