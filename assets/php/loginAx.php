<?php 
session_start();
require_once(conexion.php);
$query = "SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND password = '".$_POST['contrasena']."'";
$resultado = mysqli_query($conexion, $query);
$row = mysqli_fetch_array($resultado);
if($row){
    header("Location: ../index.php");
}else
{
    $error = "Usuario o contraseña incorrectos";
}
?>
