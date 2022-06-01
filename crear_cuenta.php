<?php
include('db.php');

session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Torresal</title> 
	<link rel="stylesheet" href="./css/crear_cuenta.css">
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
      <h1>Regístrate</h1>
      <form id="formulario" method="post">

        <label for="username">Nombre Usuario</label>
        <input type="text" name="usuario" placeholder="Enter Nombre Usuario">
        <label for="username">Email</label>
        <input type="text" name="correo" placeholder="Enter Email">

        <label for="password">Password</label>
        <input type="password" name="clave" placeholder="Enter Password">
        <button type="button" id="btnCrear">Crear cuenta</button>

      </form>
    </div>
</body>
</html>

<script>
  $('#btnCrear').click(function(){
        $.ajax({
          url: "nuevaCuenta.php",
          type: "post",
          data: $("#formulario").serialize(),
          success: function(resultado){
            alert('El registro fue un exito');
            location.href="index.php";
          }
        });
  });
    </script>