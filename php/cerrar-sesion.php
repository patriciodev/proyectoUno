<?php
require_once ('conexion.php');

session_start();
if(isset($_SESSION["login"])==TRUE){
   
   sleep(2);
    session_destroy();
    
    echo "<script>
        console.log('se ha cerrado la sesion');
        location.href = '../index.html';
    </script>";
    
}else{

    $fecha_guardada = $_SESSION["ultimoInicio"];
    $fecha_actual = ("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($fecha_actual)-strtotime($fecha_guardada));

    if($tiempo_transcurrido >= 600){
        session_destroy();

        echo "<script>
        window.location.href = '../index.html';
         </script>";
    }else{
        $_SESSION["ultimoInicio"] = $fecha_actual;
    }

}

?>