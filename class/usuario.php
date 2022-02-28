<?php

require_once("database.php");

class usuario{
	
	public function getid($email){
		$db = new Database();
		$db = $db->connect();

		$user = mysqli_query($db, "SELECT id from credenciales WHERE email = '".$email."'");
		if (!$user) {
    	printf("Error: %s\n", mysqli_error($db));
    	exit();
		}
		$resultado = mysqli_fetch_array($user);
		return $resultado[0];
	}
	public function changePass($email,$pass,$new_pass){
		$db = new Database();
		$db = $db->connect();	
		
		$salt = "estanoestucontrasenia";
		$password_enc = sha1($pass.$salt);
		$new_password_enc = sha1($new_pass.$salt);
		
		session_start();
		$nombre = $_SESSION['user'];

		
		$getNombre = mysqli_query($db, "SELECT id from credenciales WHERE email ='".$email."'");

		if (!$getNombre) {
    		printf("Error: %s\n", mysqli_error($db));
    		exit();
		}
			$nombre_correo = mysqli_fetch_array($getNombre);

		if($nombre_correo[0] == $nombre){

			$change = mysqli_query($db, "UPDATE contrasenias SET Contrasenia='".$new_password_enc."' WHERE email ='".$email."'");

		}
	}

    public function getName($id){
        $db = new Database();
        $db = $db->connect();

        $user = mysqli_query($db, "SELECT name from usuario WHERE id = '$id'");
        if (!$user) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($user);
        return $resultado[0];
    }


    public function getPoints($id){
        $db = new Database();
        $db = $db->connect();

        $points = mysqli_query($db, "SELECT points from usuario WHERE id = '$id'");
        if (!$points) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($points);
        return $resultado[0];
    }




}


?>