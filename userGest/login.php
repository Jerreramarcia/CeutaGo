<?php
  require_once("../class/database.php");
  require_once("../class/usuario.php");
  if(isset($_SESSION['user_id'])) {
    //header('Location: /php-login');
  }

  if (isset($_POST['Envio1'])) {
        $db = new Database();
        $db = $db->connect();

  if($db->connect_error){
    die("connection failed");
  }

  $email = $_POST["email1"];
  $password = $_POST["password1"];

  $sql = mysqli_query($db, "SELECT password from credenciales WHERE email = '".$email."'");
  $row = mysqli_fetch_array($sql);

  if($row){
    if($row["password"] == $password){ //AÑADIR _encrypted
      $user = new usuario();
      session_start();
      $_SESSION['user'] = $user->getid($email);
      echo $_SESSION['user'];

      header("Location: ../index.php"); //REDIRIGIR A PAGINA INICIAL
    }else{
      ?>
      <script>
        alert('Email y/o contraseña invalida');
      </script>
      <?php 
    }
  }
  else{
    ?>
    <script>
      alert('Email y/o contraseña invalida');
    </script>
    <?php
  }
  }

$message = '';
$db = new Database();
$db = $db->connect();

if(isset($_POST['Envio'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $cod_post = $_POST['postal'];

    if($cod_post >= 51001 && $cod_post <= 51005 ){
        $residencia = 1;
    }else{
        $residencia = 2;
    }
    $sqlUser = "INSERT INTO `usuario`(`name`, `points`, `tipo_usuario`, `cdo_post`) VALUES ('$name',0,'$residencia','$cod_post')";


    $sqlChckN = "SELECT name FROM usuario WHERE name='$name'";
    $sqlChckE = "SELECT email FROM credenciales WHERE email = '$email'";



    $sqlChckNex = mysqli_query($db,$sqlChckN);
    $sqlChckEex = mysqli_query($db,$sqlChckE);
    $row1 = mysqli_fetch_array($sqlChckNex);
    $row2 = mysqli_fetch_array($sqlChckEex);

    if(empty($row1) && empty($row2)){

        $sqlUserEx = mysqli_query($db,$sqlUser);

        $sqlID = "SELECT id FROM usuario WHERE name = '$name'";
        $sqlChckID = mysqli_query($db, $sqlID);
        $id = mysqli_fetch_array($sqlChckID);
        $sqlCred = "INSERT INTO `credenciales`(`id`, `email`, `password`) VALUES ($id[0], '$email', '$password')";
        $sqlCredEx =mysqli_query($db,$sqlCred);
        ?>

        <script>alert("Usuario Creado");</script>

        <?php

        $sql = "SELECT nombre,id,puntos,id_puestos,tipo_usuario,tipo_puestos FROM usuario, puestos WHERE id=$id[0]";

        $resul = $db->query($sql);

        while($row = $resul->fetch_assoc()) {

            $tarea = $row['id_puestos'];
            $points = $row['puntos'];
            $id_user = $row['id'];
            $tipolugar = $row['tipo_puestos'];
            $tipousuario = $row['tipo_usuario'];
            $nombre = $row['nombre'];

            if ($tipousuario == 'Residente') {

                if ($tipolugar == 'Local') {

                    $points = $points / 4;

                    $sql = "INSERT INTO `tasks` (`user_id`, `task_id`, `points`, `status`, `name`) VALUES ($id_user, $tarea, $points, 'No visitado', 'Visita el local $nombre' )";

                    $db->query($sql);

                } else {

                    $points = $points * 2;

                    $sql = "INSERT INTO `tasks` (`user_id`, `task_id`, `points`, `status`, `name`) VALUES ($id_user, $tarea, $points, 'No visitado', 'Visita el lugar de interés $nombre' )";

                    $db->query($sql);

                }

            } else if ($tipousuario == 'No Residente') {

                if ($tipolugar == 'Turismo') {

                    $points = $points * 4;

                    $sql = "INSERT INTO `tasks` (`user_id`, `task_id`, `points`, `status`, `name`) VALUES ($id_user, $tarea, $points, 'No visitado', 'Visita el local $nombre' )";

                    $db->query($sql);

                } else {

                    $sql = "INSERT INTO `tasks` (`user_id`, `task_id`, `points`, `status`, `name`) VALUES ($id_user, $tarea, $points, 'No visitado', 'Visita el sitio de interes $nombre' )";

                    $db->query($sql);

                }

            }
        }
    }else{

        echo "Esas credenciales están en uso!!!";
    }


}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../styles/login-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            background-image: linear-gradient(dodgerblue,lightblue);
            max-width: 100%;
        }
        html {

            background-image: linear-gradient(lightblue, dodgerblue);

        }
    </style>
    <title></title>
</head>

<body>

<br/><br/>

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Inicio</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
        <div class="login-form">
            <div class="sign-in-htm">

                <form action="" method="POST">
                    <div class="group">
                        <label for="user" class="label">Correo</label>
                        <input id="email1" name="email1" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input id="password1" type="password1" name="password1" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" name="Envio1" value="Entrar">
                    </div>
                    <div class="hr"></div>
                </form>
                </div>

            <div class="sign-up-htm">
                <form action="" method="POST">
                <div class="group">
                    <label for="user" class="label">Usuario</label>
                    <input name="name" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Codigo postal</label>
                    <input name="postal" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Contraseña</label>
                    <input name="password" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repetir Contraseña</label>
                    <input name="confirm_password" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Correo</label>
                    <input name="email" type="text" class="input">
                </div>
                <div class="group">
                    <input type="submit" class="button" name="Envio" value="Registrarse">
                </div>
                <div class="hr"></div>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
