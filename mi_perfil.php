<?php require_once('./php/conexion.php');
  
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/mi-perfil.css">
</head>
<body>
    
<div class="main">
    <div class="whitespace">
    </div>
    <div class="foto-usuario">
       
    </div>
    <div class="perfil-info">
        <div class="control">
            <form enctype="multipart/form-data" action="./php/subirfoto.php" method="post">
            <input type="file" name="foto">
            <input type="submit" value="subirfoto">
        </form>
        </div>
        <p>Nombre : <?php echo $_SESSION["nombre"] ?> </p>
        <p>correo : <?php  echo  $_SESSION["usuario"]  ?></p>
        <p>Ultima inicio : <?php echo $_SESSION["ultimoInicio"] ?></p>
        <p>descripcion : </p>
        <div class="whitespace"></div>
        <br><br>
        <a href="./php/cerrar-sesion.php">cerrar sesion</a>
        <a href="./php/eliminar_usuario.php">Eliminar cuenta</a>
    </div>
    <div class="config">
        <button>configuraciones</button>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>