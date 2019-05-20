<?php 

    require_once('./conexion.php');


    if(isset($_POST["correo"]) && isset($_POST["contrasena"])){

        sleep(2);

        $correo = mysqli_real_escape_string($cnx,$_POST["correo"]);
        $contrasena = md5(mysqli_real_escape_string($cnx,$_POST["contrasena"]));

        $consulta = "SELECT * FROM CLIENTE WHERE CORREO ='$correo' AND CONTRASENA = '$contrasena' ;";

        $nueva_consulta = mysqli_query($cnx,$consulta);
     
        if($nueva_consulta) {
            $resultado = mysqli_num_rows($nueva_consulta);
            
            if($resultado > 0){
                
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["usuario"] = $correo;
                $_SESSION["ultimoInicio"] = date("Y-n-j H:i:s");
                $nueva_consulta->free();

                $query = "SELECT * FROM CLIENTE WHERE CORREO ='$correo' ; ";
                $resul = $cnx->query($query);
                $registro = $resul->fetch_assoc();
                $_SESSION["nombre"] = $registro["NOMBRE"];
                echo 1;

            }else{
                echo 0;
            }
        }else{
            echo "error";
        }

    }



?>
