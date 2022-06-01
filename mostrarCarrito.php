<?php
include('db.php');

session_start();
?>

<?php
        if (isset($_SESSION['carrito'])) {
        $carrito_mio=$_SESSION['carrito'];    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <title>Torresal</title> 
    <link rel="stylesheet" href="./css/carrito.css">
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
    <main>

    	<section>
    		<table>
    			<tr>
    			    <th>Producto</th>
    			    <th>Descripcion</th>
    			    <th>Precio</th>
    			    <th>Cantidad</th>
    			    <th>Subtotal</th>
    		    </tr>
                <?php

            $total=0;
         for($i=0;$i<count($carrito_mio);$i ++){
            if($carrito_mio[$i]!=NULL){        

                 ?>

    		    <tr>
    		        <td><?php echo $carrito_mio[$i]['nombreProd'];?></td>
    		        <td><?php echo $carrito_mio[$i]['descripcion'];?></td>
    		        <td>S/.<?php echo $carrito_mio[$i]['precio'];?></td>
    		        <td><?php echo $carrito_mio[$i]['cantidad'];?></td>
    		        <td>S/.<?php echo $carrito_mio[$i]['precio']*$carrito_mio[$i]['cantidad']; ?></td>
                    <td>
                        <form action="eliminar_carrito.php" method="post">
                            <input type="hidden" name="posicion" value="<?php echo $i;?>">
                            <input type="submit" name="btnEliminar" class="botonEliminar" value="🗑️">
                        </form>
                    </td>
    		    </tr>
    		    <?php
            $total += $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];
               }
            }

       ?>
            <tr>
                <td colspan="3" style="border-color: white;"></td>
                <td style="border-color: white; background: red; color: white;">Total</td>
                <td>S/.<?php echo $total; ?></td>
            </tr>
    		</table>

            <center>
                <form action="formularioPagar.php" method="post">
                    <input type="submit" name="btnComprar" class="botonComprar" value="Comprar">
                </form>
            </center>

    	</section>	    	
    </main>
    <footer></footer>
</body>
</html>

<?php

       }else{
        header("location: ".$_SERVER['HTTP_REFERER']);
      }

?>