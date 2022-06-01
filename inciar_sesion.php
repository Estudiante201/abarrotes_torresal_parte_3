<?php
include('db.php');

session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Torresal</title> 
	<link rel="stylesheet" href="./css/login.css">
	<script src="js/jquery-3.6.0.min.js"></script>
</head>  
<body>
<header><label class="nombreParte1">Abarrotes</label>
		<label class="nombreParte2">Torresal&nbsp; </label>
		<nav style="float:right">
			<a class="botones" href="index.php">Inicio&nbsp;</a>
			<a class="botones" href="arroz.php">Productos&nbsp;</a>
			<a class="botones" href="crear_cuenta.php">Crear cuenta&nbsp;</a>
			<a class="botones" href="inciar_sesion.php">Iniciar sesión</a>
			<?php
               if (isset($_SESSION['carrito'])) { 
            ?>
			<a class="botones" href="mostrarCarrito.php">S/<?php echo $_SESSION['totalCarrito'] ?> 🛒</a>
		    <?php }else{ ?>
			<a class="botones" href="">S/0.0 🛒</a>
			<?php } ?>
		</nav>
    </header>
    <div class="login-box">
      <img src="imagenes/login/logo.png" class="avatar" alt="Avatar Image">
      <h1>Iniciar Sesión</h1>
      <form id="formulario" method="post">

        <label for="username">Usuario</label>
        <input type="text" name="usuario" placeholder="Nombre de usuario">

        <label for="password">Contraseña</label>
        <input type="password" name="clave" placeholder="Enter Password">
        <button type="button" id="btnIngresar">Ingresar</button>
       
        <p>¿Eres nuevo?</p>
        
        <a class="btnRegistrar" href=""> <strong>Registrate</strong></a></div>

      </form>
    </div>

</body>
</html>

<script>
	$('#btnIngresar').click(function(){
        $.ajax({
        	url: "login.php",
        	type: "post",
        	data: $("#formulario").serialize(),
        	success: function(resultado){
        		if (resultado=="si") {
        			location.href="index.php";
        		}else{
        			alert('Datos de ingreso no valido, intentalo de nuevo por favor');
        		}
        	}
        });
	});
    </script>