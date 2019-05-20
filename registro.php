    <?php require_once('./php/conexion.php') ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/registro.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    


</head>
<body>
      <!--nav-->
      <nav>
        <div class="back">
        <i class="fas fa-arrow-left" id="regresar"></i>
        </div>
    </nav>
    <div class="container">
        <h1>Crea tu cuenta!</h1>
        <p id="error" style="color : red; text-align : center; font-weight : bold;" ></p>
        <form class="form1" action="./php/registrar-usuario.php" method="POST"  >
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Ingrese su nombre..." autocomplete="off" name="nombre" id="nombre"   pattern="[A-Za-z] " required>
            <label for="correo">Correo</label>
            <input type="email" placeholder="Ingrese su correo..." autocomplete="off" name="correo" id="correo" required>
            <label for="contrasena">Contrasena</label>
            <input type="password" placeholder="Ingrese su contraseña..."  name="contrasena" id="contrasena" maxlength="30" pattern="[A-Za-z0-9_-]{8,30} " required>
            <button type="submit" id="enviar">Registrar</button>
        </form>
        <a href="inicio-sesion.php">Ya poseo una cuenta</a>
        <div class="diseno">

        </div>
    </div>

    <script>
        
        var back = document.getElementById("regresar");

        back.addEventListener("click",() => {
            setTimeout(() => {
                window.location.href = "index.html";
            },1000);
        });


        //no nos manda el formulario al apretar click
        $(function(){
            $("#enviar").on("click",(e) => {
                e.preventDefault();

                var nombre = $("#nombre").val();
                var correo = $("#correo").val();
                var contrasena = $("#contrasena").val();

                if(nombre == "" || correo == "" || contrasena == ""){
                    $("#error").html("rellene todos los campos!").show(300).delay(3000).hide(300);
                }else{
                    $.ajax({
                    type : "POST",
                    url : "php/registrar-usuario.php",
                    data : ('nombre='+nombre +'&correo='+correo+'&contrasena='+contrasena),
                    success : function(res){
                        if(res == 1){   
                            $("#error").html("te registraste correctamente");
                            setTimeout(()=>{
                                window.location.href="inicio-sesion.php"; 
                            },2500);
                        }else{
                            var msjError = "El usuario ya se encuntra registrado";
                            $("#error").html(msjError).show(300).delay(3000).hide(300);
                        }
                    }   
                    });
                }
        });
        }) ; 

    </script>



</body>
</html>