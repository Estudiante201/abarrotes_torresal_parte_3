<?php
include('db.php');

session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Torresal</title> 
	<link rel="stylesheet" href="./css/inicio.css">
</head>  
<body>
<header><label class="nombreParte1">Abarrotes</label>
		<label class="nombreParte2">Torresal&nbsp; </label>
		<nav style="float:right">
			<a class="botones" href="index.php">Inicio&nbsp;</a>
			<a class="botones" href="arroz.php">Productos&nbsp;</a>
			<?php
                 if(isset($_SESSION['usuario'])){
            ?>
              <a class="botones" href="" style="border: 1px solid white; 
              border-radius: 25px; background: white; font-family: none; color: black;padding: 5px;
              font-weight: bolder;">Usuario: <?php echo $_SESSION['usuario']?></a>
                 
                 <a class="botones" href="cerrarSesion.php">Close</a>
                 <?php }else{ ?>
                 	<a class="botones" href="crear_cuenta.php">Crear cuenta&nbsp;</a>
                 	<a class="botones" href="inciar_sesion.php">Iniciar sesión</a>
            <?php } ?>

			<?php
               if (isset($_SESSION['carrito'])) { 
            ?>
			<a class="botones" href="mostrarCarrito.php">S/<?php echo $_SESSION['totalCarrito'] ?> 🛒</a>
		    <?php }else{ ?>
			<a class="botones" href="">S/0.0 🛒</a>
			<?php } ?>
		</nav>
    </header>
    <div class="slider">
      <ul>
        <li>
            <img src="imagenes/inicio/1.jpg">
        </li>
        <li>
            <img src="imagenes/inicio/2.jpg">
        </li>
        <li>
            <img src="imagenes/inicio/3.jpg">
        </li>
        <li>
            <img src="imagenes/inicio/4.png">
        </li>
      </ul>
    </div>

    <div class="container">
		
		<div class="card">
			<img src="imagenes/inicio/mision.jfif">
		    <h4>  Misión</h4>
		    <p>Somos una empresa encargada de brindar y ofrecer productos de excelente calidad; a través de un buen servicio, el mejor precio y un trato amable por parte de quienes conformamos esta empresa.</p>
		</div>
		<div class="card">
			<img src="imagenes/inicio/images (1).jpg">
		    <h4>Visión</h4>
		    <p>Buscamos ser la primera opción de nuestros clientes al momento de adquirir insumos para su negocio; permitiéndonos crear relaciones duraderas basadas en la confianza y la honestidad que nos permita crecer conjuntamente todos los días.</p>
		</div>
		<div class="card">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44175.34172917564!2d-77.11280875310088!3d-11.864263399930234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105d1464cfdafd1%3A0x8d0a038a4e5435bc!2sPuente%20Piedra!5e0!3m2!1ses!2spe!4v1650982032945!5m2!1ses!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		    <h4>Ubicación</h4>
	      <p>Pabellón. O-1 Interior 17 Mercado Las Tres Regiones Puente Piedra Lima 22 Lima, Perú.</p>
		 </div>
	 
	  <footer class="footer-distributed">
	  
				  <div class="footer-left">
	  
					  <h3>Company<span>Torresal</span></h3>
	  
					  <p class="footer-links">
						  <a href="#" class="link-1"> Inicio </a>
						  
						  <a href="#">Productos</a>
					  
						  <a href="#">Crear Cuentas</a>
					  
						  <a href="#">Iniciar Sesión</a>
					  
						  <a href="#">Contactos</a>
					  </p>
	  
					  <p class="footer-company-name">Company Name © 2022</p>
				  </div>
	  
				  <div class="footer-center">
	  
					  <div>
						  <i class="fa fa-map-marker"></i>
						  <p><span>Pabellon O-1</span> Mercado Las Tres Regiones Puente Piedra</p>
					  </div>
	  
					  <div>
						  <i class="fa fa-phone"></i>
						  <p>(01)902 982 125</p>
					  </div>
	  
					  <div>
						  <i class="fa fa-envelope"></i>
						  <p><a href="mailto:abarrotestorresal@gmail.com">abarrotestorresal@gmail.com</a></p>
					  </div>
	  
				  </div>
	  
				  <div class="footer-right">
	  
					  <p class="footer-company-about">
						  <span>About the company</span>
						  Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
					  </p>
	  
					  <div class="footer-icons">
	  
						  <a href="#"><i class="fa fa-facebook"></i></a>
						  <a href="#"><i class="fa fa-twitter"></i></a>
						  <a href="#"><i class="fa fa-linkedin"></i></a>
						  <a href="#"><i class="fa fa-github"></i></a>
	  
					  </div>
	  
				  </div>
	    
			  </footer>
	  			  
</body>
</html>