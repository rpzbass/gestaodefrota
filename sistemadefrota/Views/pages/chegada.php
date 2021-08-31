<?php   
  
  require_once 'Models/Chegada.php';

  $C1 = new Chegada();

  ?>

<h2 style="margin: 40px">CHEGADA</h2>

<form method="POST">
	
		
  <div class="form-group" >
    <label for="exampleInputEmail1">KM FINAL</label>
    <input type="number" class="form-control" name="km_f" style="text-align: center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="KM" maxlength="6" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">DATA</label>
    <input type="date" class="form-control"  name="dat_f" style="text-align: center" id="exampleInputPassword1" placeholder="DATA">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">HORARIO</label>
    <input type="time" class="form-control center" name="tim_f" style="text-align: center" id="exampleInputPassword1" placeholder="HORARIO">
  </div>
  

  <input type="submit" style="width: 60%" name="Registro" class="btn btn-primary" value="Registrar">
  
</form>


<?php

    

      if(isset($_POST['Registro'])){


        $km_f = $_POST['km_f'];

        $dat_f = $_POST['dat_f'];

        $tim_f = $_POST['tim_f'];


       
      

        
        if(!empty($km_f) && !empty($dat_f) && !empty($tim_f)){

              $C1->conectar('127.0.0.1','km_control','root','');

             if($C1->msgError == ""){

                
                $veiculoatual = $C1->veiculoatual();
               
                $C1->cardisponivel($veiculoatual['FK_IN_Cadcarros']);

                if($C1->chegou($km_f,$dat_f,$tim_f)){


                    echo "<h3 style=\"text-align:center;background-color:green;\">Corrida finalizada com sucesso !!!</h3>";

                  

                  } 

               }     



        }else{


                  echo "<h3 style=\"text-align:center;background-color:orange;\">Preencha todos os campos !!!</h3>";

                  $C1->conectar('127.0.0.1','km_control','root','');

                  print_r($C1->veiculoatual());


        }     







}



      





?>

