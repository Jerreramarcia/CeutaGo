<?php
class Database{

    public $DB_HOST = "localhost";
    public $DB_USER = "root";
    public $DB_PASS = "";
    public $DB_DATABASE = "ceutago";

    public function connect(){

        $db = new mysqli($this-> DB_HOST,$this-> DB_USER,$this-> DB_PASS,$this-> DB_DATABASE);

        return $db;
    }
    public function getUsers($db){

        $user = mysqli_query($db, "SELECT COUNT(*) from `usuario` WHERE 1");
        if (!$user) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($user);
        return $resultado[0];
    }
    public function getPoints($db){
        $user = mysqli_query($db, "SELECT SUM(points) from `tasks` WHERE `status` = 'Visitado'");
        if (!$user) {
            return 0;
        }else{
            $resultado = mysqli_fetch_array($user);
            if(is_null($resultado[0])){
                return 0;
            }else {
                return $resultado[0];
            }
        }

    }

    public function getTasks($db){
        $user = mysqli_query($db, "SELECT COUNT(*) from `puestos` WHERE 1");
        if (!$user) {
            return 0;
        }else{
            $resultado = mysqli_fetch_array($user);
            if(is_null($resultado[0])){
                return 0;
            }else {
                return $resultado[0];
            }
        }

    }

}
