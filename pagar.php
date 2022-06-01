<?php
include('db.php');

session_start();
$carrito_mio=$_SESSION['carrito'];

   ini_set('date.timezone','America/Lima');
   $hoy=date('Y-m-d');

   $nombre=$_POST['nombre'];
   $apellido=$_POST['apellido'];
   $dni=$_POST['dni'];
   $celular=$_POST['celular'];
   $correo=$_POST['correo'];

   $tarjeta=$_POST['tarjeta'];

   $total=$_SESSION['totalCarrito'];

   $usuario="";
   $existeUsuario=false; 

   if(isset($_SESSION['usuario'])){
      $usuario=$_SESSION['usuario'];
      $existeUsuario=true;
   }



   $idCliente="";
   $idFactura="";
   $idDetalle="";

    $sql="SELECT * FROM cliente WHERE dni = '$dni'";
    $result=mysqli_query($conexion,$sql);
       while($mostrar=mysqli_fetch_array($result)){
       $idCliente=$mostrar['idCliente'];
       }

     if($idCliente==""){
      $sql="INSERT INTO cliente(nombre,apellido,dni,celular,correo) VALUES ('$nombre','$apellido','$dni','$celular','$correo')";
      mysqli_query($conexion,$sql);
     }

     $sql="SELECT * FROM cliente WHERE dni='$dni'";
    $result=mysqli_query($conexion,$sql);
       while($mostrar=mysqli_fetch_array($result)){
       $idCliente=$mostrar['idCliente'];
       }

       $sql="SELECT max(idFactura) as mayor FROM factura";
       $result=mysqli_query($conexion,$sql);
       while($mostrar=mysqli_fetch_array($result)){
       $idFactura=$mostrar['mayor']+1;
       }

       $sql="SELECT max(idDetalle) as mayor FROM detalle";
       $result=mysqli_query($conexion,$sql);
       while($mostrar=mysqli_fetch_array($result)){
       $idDetalle=$mostrar['mayor']+1;
       }

       
       $sql="INSERT INTO factura(idFactura,fechaCompra,montoTotal,tipoPago,idCliente) VALUES ('$idFactura','$hoy','$total','$tarjeta','$idCliente')";
       $exito=mysqli_query($conexion,$sql);


       $id=0;
       $cantidad=0;
       $precio=0;
       $stock=0;
   for($i=0;$i<count($carrito_mio);$i ++){
      if($carrito_mio[$i]!=NULL){
      $id=$carrito_mio[$i]['id'];
      $cantidad=$carrito_mio[$i]['cantidad'];
      $precio=$carrito_mio[$i]['precio'];
      $stock=$carrito_mio[$i]['stock'];

      $nuevoStock=$stock-$cantidad;

       $sql="INSERT INTO detalle(idDetalle,idFactura,idProducto,cantidad,precioVenta) VALUES ('$idDetalle','$idFactura','$id','$cantidad','$precio')";
       $exito=mysqli_query($conexion,$sql);

       $sql="UPDATE producto set stock='$nuevoStock' WHERE idProducto='$id'";
       $exito=mysqli_query($conexion,$sql);

       $idDetalle++;

         }

    }

    session_destroy();

    session_start();

    if ($existeUsuario) {
       $_SESSION['usuario']=$usuario;
    }
?>