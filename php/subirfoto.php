<?php

require_once('conexion.php');

session_start();


/*TODO: subir fotos a la base de datos para el usuario!*/
$nombre_imagen = $_FILES["imagen"]["foto"];
$tipo_imagen = $_FILES["imagen"]["type"];
$tamano_imagen = $_FILES["imagen"]["size"];

//nombre en la carpeta destino
$carpeta_destino["DOCUMENT_ROOT"].'./uploads';

move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta_destino.$nombre_imagen);

$q = "INSER INTO CLIENTE(FOTO) VALUES('$carpeta_destino.$nombre_imagen');";

$resul = mysqli_query($cnx,$query); 

?>