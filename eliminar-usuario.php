<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar usuario</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="./css/eliminar-usuario.css">
</head>
<body>
    <nav>
        <div class="back">
        <i class="fas fa-arrow-left" id="regresar"></i>
        </div>
    </nav>
    <div class="container"> 
        <h1>Eliminar usuario</h1>
        <p>Ingresa tu email para eliminar tu cuenta</p>
        <form  class="form1"  action="./php/eliminar_usuario.php" method="post">
            <p id="error"></p>
            <input type="email" name="correo" id="correo" placeholder="Ingresa tu correo">
            <button type="submit" id="eliminar">Eliminar</button>
        </form>
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
        $("#eliminar").on("click",(e)=>{
            e.preventDefault();

            var correo = $("#correo").val();
            
            if(correo != ""){
                
                $.ajax({
                    type : "POST",
                    url : "php/eliminar_usuario.php",
                    data : "correo="+correo,
                    success : (data) => {
                        if(data>0){
                            alert("se ha eliminado correctamente el usuaro");
                            window.location.href = "index.html";
                        }else{
                            $("#error").html("No existe el correo ingresado!").show(300).delay(3000).hide(300);
                        }
                    },
                    complete : () => {
                        console.log("ok");
                    } 
                });
            }else{
                var msjError = "Rellene el campo!";
                $("#error").html(msjError).show(300).delay(3000).hide(300);
            }

        });
    });


    </script>

</body>
</html>