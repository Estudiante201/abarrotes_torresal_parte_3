<?php
include('../db.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	
	<title>Torresal</title> 
	<link rel="stylesheet" href="../css/reporte.css">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #0575E6, #00F260);
            color:white;
        }
    </style>
</head>  
<body>
<header><label class="nombreParte1">Abarrotes</label>
		<label class="nombreParte2">Torresal&nbsp; </label>
		<nav style="float:right">
			<a class="botones" href="index.php">Reporte&nbsp;</a>
			<a class="botones" href="../index.php">Inicio&nbsp;</a>
		</nav>
    </header>
<main>
    	
<?php
if (!(isset($_POST['btnMostrar']))) {   
?>             

   <h1 class="text-center">Generar Reportes</h1>

            <h3 class="text-center">Lista de datos que se guardo</h3>

    <div class="reporte">
        <form action="" method="post">
        
        <select name="reporte">
            <option value="">Seleccione</option>
            <option value="reporteIngreso">Reporte de Ingreso</option>
            <option value="reporteVentas">Reporte de Ventas</option>
            <option value="reporteMetodosPagos">Reporte de métodos de pagos más frecuente</option>
        </select>
        <input type="submit" name="btnMostrar" value="Mostrar">
    </form>
    </div>

 <?php 
     } else if (isset($_POST['btnMostrar']) && $_POST['reporte']=='reporteIngreso') {

 ?>  

    <h1 class="text-center">Reporte de Ingreso</h1>

    <div class="reporte">
        <form action="" method="post">
        
        <select name="reporte">
            <option value="">Seleccione</option>
            <option value="reporteIngreso">Reporte de Ingreso</option>
            <option value="reporteVentas">Reporte de Ventas</option>
            <option value="reporteMetodosPagos">Reporte de métodos de pagos más frecuente</option>
        </select>
        <input type="submit" name="btnMostrar" value="Mostrar">
    </form>
    </div>

    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Subtotal</th>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT categ.idCategoria as id,categ.nombreCateg , SUM(d.precioVenta * d.cantidad) as subtotal FROM detalle d INNER JOIN producto p ON d.idProducto=p.idProducto INNER JOIN categoria categ ON p.idCategoria=categ.idCategoria GROUP BY categ.idCategoria";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                    <tr style="text-align: center;">
                                <td><?php echo $mostrar['id']; ?></td>
                                <td><?php echo $mostrar['nombreCateg']; ?></td>
                                <td>S/.<?php echo $mostrar['subtotal']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php
                        $sql="SELECT SUM(precioVenta * cantidad) as total FROM detalle";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                            <center>
                                Ganancia Total: <label style="color: red">S/.</label>
                                <label style="color: blue"><?php echo $mostrar['total']; ?></label>
                                                
                            </center>
                        <?php
                        }
                        ?>
           </div>
       </div> 
    </div>


<?php
} else if (isset($_POST['btnMostrar']) && $_POST['reporte']=='reporteVentas') {
?>  
    
    <h1 class="text-center">Reporte de Ventas</h1>

    <div class="reporte">
        <form action="" method="post">
        
        <select name="reporte">
            <option value="">Seleccione</option>
            <option value="reporteIngreso">Reporte de Ingreso</option>
            <option value="reporteVentas">Reporte de Ventas</option>
            <option value="reporteMetodosPagos">Reporte de métodos de pagos más frecuente</option>
        </select>
        <input type="submit" name="btnMostrar" value="Mostrar">
    </form>
    </div>

    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                                <th scope="col">F. Compra</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col"># Factucra</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Tipo de Tarjeta</th>
                </thead>
                <tbody>
                    <?php
                        $sql="SELECT f.fechaCompra, c.nombre, c.apellido, f.idFactura, p.nombreProd, d.precioVenta, d.cantidad, SUM(d.precioVenta * d.cantidad) as subtotal, f.tipoPago FROM detalle d INNER JOIN producto p ON d.idProducto=p.idProducto INNER JOIN factura f ON d.idFactura=f.idFactura INNER JOIN cliente c ON f.idCliente=c.idCliente GROUP BY d.idDetalle";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                    <tr>
                                <td><?php echo $mostrar['fechaCompra']; ?></td>
                                <td><?php echo $mostrar['nombre']; ?></td>
                                <td><?php echo $mostrar['apellido']; ?></td>
                                <td><?php echo $mostrar['idFactura']; ?></td>
                                <td><?php echo $mostrar['nombreProd']; ?></td>
                                <td><?php echo 'S/.'.$mostrar['precioVenta']; ?></td>
                                <td><?php echo $mostrar['cantidad']; ?></td>
                                <td><?php echo 'S/.'.$mostrar['subtotal']; ?></td>
                                <td><?php echo $mostrar['tipoPago']; ?></td>
                    </tr>
                            <?php
                             }
                            ?>
                </tbody>
            </table>
           </div>
       </div> 
    </div>



<?php
} else if (isset($_POST['btnMostrar']) && $_POST['reporte']=='reporteMetodosPagos') {
?>  
    
    <h1 class="text-center">Reporte de métodos de pagos más frecuente</h1>

    <div class="reporte">
        <form action="" method="post">
        
        <select name="reporte">
            <option value="">Seleccione</option>
            <option value="reporteIngreso">Reporte de Ingreso</option>
            <option value="reporteVentas">Reporte de Ventas</option>
            <option value="reporteMetodosPagos">Reporte de métodos de pagos más frecuente</option>
        </select>
        <input type="submit" name="btnMostrar" value="Mostrar">
    </form>
    </div>

    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                                <th scope="col">VISA</th>
                                <th scope="col">MASTERCARD</th>
                </thead>
                <tbody>
                    <?php
                    $v="";
                    $m="";

                        $sql="SELECT COUNT(tipoPago) as VISA  FROM factura  
                WHERE tipoPago='VISA'";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                            $v=$mostrar['VISA'];
                        }


                            $sql="SELECT COUNT(tipoPago) as MASTERCARD  FROM factura  
                WHERE tipoPago='MASTERCARD'";
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                            $m=$mostrar['MASTERCARD'];
                        }

                        ?>
                    <tr style="text-align: center;">
                                <td><?php echo $v; ?></td>
                                <td><?php echo $m; ?></td>
                    </tr>
                </tbody>
            </table>
           </div>
       </div> 
    </div>

 <?php }else if (isset($_POST['btnMostrar'])) { ?>
   <h1 class="text-center">Generar Reportes</h1>

            <h3 class="text-center">Lista de datos que se guardo</h3>

    <div class="reporte">
        <form action="" method="post">
        
        <select name="reporte">
            <option value="">Seleccione</option>
            <option value="reporteIngreso">Reporte de Ingreso</option>
            <option value="reporteVentas">Reporte de Ventas</option>
            <option value="reporteMetodosPagos">Reporte de métodos de pagos más frecuente</option>
        </select>
        <input type="submit" name="btnMostrar" value="Mostrar">
    </form>
    </div>

 <?php } ?>
    
    </main>
    <footer></footer>
</body>
</html>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
      
<!--    Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function(){
         $('#tablaUsuarios').DataTable(); 
      });
    </script>