<?php

require_once('./class/database.php');

$db = new Database();

$db = $db->connect();

if ($_GET['task'] && $_GET['user']){

    $task = $_GET['task'];

    $usuario = $_GET['user'];

    $sql = "SELECT * FROM usuario WHERE id = $usuario";

    $resul = $db->query($sql);
    $row = $resul->fetch_assoc();
    $puntos = $row['points'];

    $sql = "SELECT points FROM tasks WHERE user_id = $usuario AND task_id = $task";

    $puntos_tarea = $db->query($sql);

    $row = $puntos_tarea->fetch_assoc();
    $puntos2 = $row['points'];

    $puntos_tot = $puntos + $puntos2;

    $sql = "UPDATE usuario SET points = $puntos_tot WHERE id = $usuario";

    if($db->query($sql)){

        ?>
<script>alert("Los puntos se han añadido correctamente.")</script>

<?php
    }else{
?>
        <script>alert("Los puntos se han añadido correctamente.")</script>
<?php
    }

}

?>


