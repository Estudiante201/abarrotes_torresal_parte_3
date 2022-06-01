<?php
include('db.php');

	session_start();
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	$respuesta=false;

$sql="SELECT * from usuario WHERE nombreUsuario='$usuario' AND clave='$clave'" ;
                        $result=mysqli_query($conexion,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
    		            $respuesta=true;
    		            $_SESSION['usuario']=$mostrar['nombreUsuario'];
		                }

		                if ($respuesta) {
		                	echo "si";
		                }else{
		                	echo "no";
		                }


?>