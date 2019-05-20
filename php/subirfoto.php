<?php

require_once('conexion.php');

session_start();

if(isset($_SESSION["login"]) == TRUE){
/*TODO: subir fotos a la base de datos para el usuario!*/
$nombre_imagen = $_FILES["foto"]["name"];
$tipo_imagen = $_FILES["foto"]["type"];
$tamano_imagen = $_FILES["foto"]["size"];

//nombre en la carpeta destino
$carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/validar/uploads/';

$correo = $_SESSION["usuario"];

move_uploaded_file($_FILES["foto"]["tmp_name"],$carpeta_destino.$nombre_imagen);
$q = "UPDATE CLIENTE SET FOTO = '$nombre_imagen' WHERE CORREO ='$correo';";

$update = mysqli_query($cnx,$q);

    if($update){
        echo 1;
    }else{
        echo 0;
    }
}

?>