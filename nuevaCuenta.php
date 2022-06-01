<?php
include('db.php');

session_start();

$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];


       $sql="INSERT INTO usuario(correo, nombreUsuario, clave) VALUES ('$correo','$usuario','$clave')";
       $exito=mysqli_query($conexion,$sql);
?>