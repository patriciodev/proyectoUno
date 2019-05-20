<?php
require_once('./conexion.php');

if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contrasena"])){
  
    sleep(1);
    $nombre = mysqli_real_escape_string($cnx,$_POST["nombre"]);
    $correo = mysqli_real_escape_string($cnx,$_POST["correo"]);
    $contrasena = md5(mysqli_real_escape_string($cnx,$_POST["contrasena"]));

    $consulta = "SELECT CORREO FROM CLIENTE WHERE CORREO LIKE '$correo' ; ";
    
    if($resul = mysqli_query($cnx,$consulta)){
        $num_rows = mysqli_num_rows($resul);

        if($num_rows == 0){

            $query = "INSERT INTO CLIENTE(NOMBRE,CORREO,CONTRASENA) VALUES('$nombre','$correo','$contrasena')";

            $insert = mysqli_query($cnx,$query);

            if($insert){
                echo 1;
            }

        }else{
            echo 0;
        }
    }

}


mysqli_close($cnx);

?>