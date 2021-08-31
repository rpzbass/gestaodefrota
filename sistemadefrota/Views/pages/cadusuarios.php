<?php

            if(!isset($_SESSION['ID_usuario'])) {

              header('Location: '.INCLUDE_PATH.'login');
              exit();
          
         
             }
             if($_SESSION['ID_usuario'] != 6){

                 session_destroy();
                    sleep(1);
                header('Location: '.INCLUDE_PATH.'login');
                exit();
          


             }




         if(isset($_GET['logout'])){

                    
                    session_destroy();
                    sleep(1);
                    header('Location: '.INCLUDE_PATH.'login');

                  }


    require_once 'Models/Usuarios.php';

    $X = new Usuarios();




?>




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
<body>


<main class="login-form">
    <div class="cotainer" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">CADASTRO DE USUARIOS</div>
                    <div class="card-body">
                        <form  method="POST">
                                <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Nome Condutor</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="nome" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email Condutor</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="senha" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Re-Senha</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="resenha" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar">
                                
                                
                               
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

        if(isset($_POST['cadastrar'])){

        $nome = $_POST['nome'];
        $email =$_POST['email'];
        $senha = $_POST['senha'];
        $resenha = $_POST['resenha'];

        if(!empty($nome) && !empty($email) && !empty($senha) && $senha == $resenha){



                    $X->conectar('127.0.0.1','km_control','root','');
                    
                    if($X->msgError == ""){

                        $X->cadastrar($nome,$email,$senha);   
                            
                        echo "Usuario cadastrado com sucesso!!";
                        



                    }else{


                        echo $X->msgError;


                    }
                    



        }else {



                    echo "Preencham Campos vazios ou senhas diferentes";


        }










        }







?>
