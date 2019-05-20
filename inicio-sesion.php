
<?php require_once('./php/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio sesion</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="./css/iniciosesion.css">
</head>
<body>

    <nav>
        <div class="back">
            <i class="fas fa-arrow-left regresar" id="regresar"></i>
        </div>
    </nav>
    <div class="container">
        <h1>
            Bienvenido!
        </h1>
        <form class="form-inicio-sesion inicio form1" action="./php/inicio_sesion.php" method="post">
            <label for="correo"> correo</label>
            <input type="email" autocomplete="off" placeholder="ingresa tu correo" name="correo" id="correo" required>
            <label for="contrasena">Contrasena</label>
            <input type="password" pattern="[A-Za-z0-9_-]{1,15}" name="contrasena" id="contrasena" placeholder="ingrese tu contraseña" required>
            <p id="error"
             style="color : red; text-align : center; font-weight : bold;"
             ></p>
            <button type="submit"  id="iniciar-sesion">Iniciar sesion</button>
        </form>
        <a href="#">he olvidado mi contraseña</a>
        <div class="diseno"></div>
    </div>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
   
   
    var regresar = document.getElementById("regresar");

    regresar.addEventListener("click", () => {
        setTimeout(() => {
            window.location.href = "index.html";
        },1000);
    });



    $(function(){
        $("#iniciar-sesion").on("click", (e) => {
           e.preventDefault();
           
           var correo = $("#correo").val();
           var contrasena = $("#contrasena").val();
            
           $.ajax({
               type : "POST",
               url : "php/inicio_sesion.php",
               data : "correo="+correo+"&contrasena="+contrasena,
               success : function(res){
                    if(res > 0){
                        window.location.href = 'mi_perfil.php';
                    }else{
                        console.log("usuario no existe");
                        var msjError = "usuario y/o contraseña incorrecto";
                        $("#error").html(msjError).show(300).delay(3000).hide(300);
                    }
                },
                error : function(data){
                    console.log(data);
                }
           })
        });
    })
    </script>

</body>
</html>