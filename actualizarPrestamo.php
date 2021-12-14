<?php 

include("assets/php/conexion.php");

if(isset($_GET['devolver'])){
    $id = $_GET['devolver'];
    $sql = "UPDATE prestamos SET Devuelto = 1 WHERE idPrestamos = $id";
    $resultado = mysqli_query($conn, $sql);
    if($resultado){
        echo "<script>alert('Prestamo devuelto');</script>";
        echo "<script>window.location.href='prestamos.php';</script>";
    }
    else{
        echo "<script>alert('Error al devolver');</script>";
    }
}
else{
}
mysqli_close($conn);
?>
