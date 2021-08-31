<?php

      require_once 'Models/Saida.php';


      $S = new Saida();


      $S->conectar('127.0.0.1','km_control','root','');

      $frota = $S->selecionar(); 
    

?>
  


<form method="POST">
	
		<h2 style="margin: 40px">SAIDA</h2>
  
  <div class="form-group" >  
    <label for="exampleFormControlSelect1">CARRO</label>
    <select class="form-control" name="ID_car" style="text-align:center;"> 
      <?php

             
          foreach ($frota as $key => $value){
            
          
          echo "<option class=\"form-control\"  selected disabled hidden>Selecione</option>";
           
         echo "<option class=\"form-control\" style=\"text-align:center\" value=\"".$value['ID_Cadcarros']."\">".$value['Modelo']."</option>";

          
        }
      ?>
    </select> 
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1">KM INICIAL</label>
    <input type="number" class="form-control" name="km" style="text-align: center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="KM" maxlength="6">
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">DATA</label>
    <input type="date" class="form-control"  name="date" style="text-align: center" id="exampleInputPassword1" placeholder="DATA">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">HORARIO</label>
    <input type="time" class="form-control center" name="time" style="text-align: center" id="exampleInputPassword1" placeholder="HORARIO">
  </div>
  

  <input type="submit" style="width: 70%" name="Registrar" class="btn btn-primary" value="Registrar">
  
</form>



<?php
    
      if(isset($_POST['Registrar'])){


        $km = $_POST['km'];

        $date = $_POST['date'];

        $time = $_POST['time'];

        $k = $_POST['ID_car'];

         if(!empty($km) && !empty($date) && !empty($time)){

                $S->conectar('127.0.0.1','km_control','root','');

            
            if($S->msgError == ""){


                if($S->sair($km,$date,$time,$k,$_SESSION['ID_usuario'],$_SESSION['nome'])){

            
                   echo "<h3 style=\"text-align:center;background-color:green;\">Boa viagem!!!</h3>";

            
                 }



             }

         }else {


            echo "<h3 style=\"text-align:center;background-color:orange;\">Preencha todos os campos !!!</h3>";

              
                
               
         } 




      }





?>