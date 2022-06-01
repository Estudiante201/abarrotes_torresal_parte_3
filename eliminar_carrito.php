<?php
session_start();
$carrito_mio=$_SESSION['carrito'];

if (isset($_POST['btnEliminar'])) {
	$posicion=$_POST['posicion'];
	array_splice($carrito_mio, $posicion, 1);

	 $total=0;
	 for($i=0;$i<count($carrito_mio);$i ++){
     if($carrito_mio[$i]!=NULL){
    	$total += $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];
     }
 }

 $_SESSION['carrito']=$carrito_mio;
 $_SESSION['totalCarrito']=$total;

}

header("location: ".$_SERVER['HTTP_REFERER']);

?>