<?php

require_once('conexion.php');

session_start();

if(isset($_SESSION["login"]) == true){

    sleep(2);

    $correo = $_SESSION["usuario"];

    $query = "DELETE FROM CLIENTE WHERE CORREO = '$correo';";

    $result = mysqli_query($cnx,$query);

    if($result){
        session_destroy();

        echo "<script>
        window.location.href = '../index.html';
         </script>";
    }


}

mysqli_close($cnx);

?>