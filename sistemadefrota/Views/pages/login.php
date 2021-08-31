
<?php

    require_once 'Models/Usuarios.php';

    $U = new Usuarios();

?>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL?>css/login.css"  type="css/text" >

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_FULL?>css/bootstrap.min.css">

    
</head>
<body style='background-color:#363636'>


<main class="login-form">
    <div class="cotainer" >
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bem vindo ao KM CONTROL</div>
                    <div class="card-body" style="background-color:#708090">
                        <form  method="POST" >
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Condutor</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" name="Logar" value="Entrar">
                                
                                
                               
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>







</body>
</html>



<?php

    

      if(isset($_POST['Logar'])){


        $email = $_POST['email'];

        $pass = $_POST['password'];

        

          

        
        if(!empty($email) && !empty($pass)){

              $U->conectar('127.0.0.1','km_control','root','');

             if($U->msgError == ""){


                if($U->logar($email,$pass)){


                        header('Location: '.INCLUDE_PATH.'home');

                }else{


                    echo "Email ou senha Incorretos!!!";

                }

             }else{


                echo "ERRO ::". $U->msgError;

             } 





        }else{


                  echo "<h3 style=\"text-align:center;background-color:orange;\">Preencha todos os campos !!!</h3>";



        }    











      }





?>

