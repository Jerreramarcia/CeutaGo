<?php

session_start();

require_once("database.php");

if(!isset($_SESSION['user'])){

    ?>
    <script>
        window.location.replace("../userGest/login.php");
    </script>
    <?php

}

$base = new Database;

$base=$base->connect();

$get_info = mysqli_query($base, "SELECT name, points, tipo_usuario FROM usuario WHERE id = '".$_SESSION['user']."'");
$user =mysqli_fetch_array($get_info);

if(isset($_POST["user"]) && isset($_POST["value"])){

    $cuenta = $user[1]-$_POST["value"];

    if($cuenta < 0){
        echo "No dispones de suficientes puntos";
    }else{
        $restar = mysqli_query($base, "UPDATE usuario SET points = '".$cuenta."' WHERE id = '".$_SESSION['user']."'");
        echo "Canjeado!!";
        echo "\n";
        echo "Su codigo es:". rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

    }


}

?>