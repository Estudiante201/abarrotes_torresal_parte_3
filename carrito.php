<?php
session_start();
 if (isset($_SESSION['carrito'])) {
 	$carrito_mio=$_SESSION['carrito'];
 	if(isset($_POST['btnAgregar'])){
 		$id=$_POST['id'];
 		$nombreProd=$_POST['nombreProd'];
 		$descripcion=$_POST['descripcion'];
 		$precio=$_POST['precio'];
 		$cantidad=$_POST['cantidad'];
          $stock=$_POST['stock'];
          $nuevo=true;

          for($i=0;$i<count($carrito_mio);$i ++){
            if($carrito_mio[$i]['id']==$id){
            $carrito_mio[$i]['cantidad']=$carrito_mio[$i]['cantidad']+$cantidad;
            $nuevo=false;
            break;
            }
          }

 		if ($nuevo) {
               $carrito_mio[]= array('id' =>$id ,'nombreProd' =>$nombreProd ,'descripcion' =>$descripcion ,'precio' =>$precio ,'cantidad' =>$cantidad,'stock' =>$stock );
          }
 	}

 }else{
 	    $id=$_POST['id'];
 		$nombreProd=$_POST['nombreProd'];
 		$descripcion=$_POST['descripcion'];
 		$precio=$_POST['precio'];
 		$cantidad=$_POST['cantidad'];
      $stock=$_POST['stock'];

 		$carrito_mio[]= array('id' =>$id ,'nombreProd' =>$nombreProd ,'descripcion' =>$descripcion ,'precio' =>$precio ,'cantidad' =>$cantidad,'stock' =>$stock );
 }


 $total=0;
 for($i=0;$i<count($carrito_mio);$i ++){
    if($carrito_mio[$i]!=NULL){
    	$total += $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];
    }
 }

 $_SESSION['carrito']=$carrito_mio;
 $_SESSION['totalCarrito']=$total;

 header("location: ".$_SERVER['HTTP_REFERER']);
?>