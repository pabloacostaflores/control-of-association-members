<?php 
include("assets/php/conexion.php");
if(isset($_POST['pres'])){
    $cantidad = $_POST['cantidad'];
    $idAdmin = $_SESSION['idPersona'];
    $idPersona = $_POST['IdContrato'];
    $Producto = $_POST['obj'];
    $sql="INSERT INTO prestamos(Cantidad, Devuelto, Objeto_idObjeto, Administrador_idAdministrador, Persona_idPersona) VALUES ('$cantidad','False','$Producto','$idAdmin','$idPersona')"  ;
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Prestamo realizado con exito');</script>";
    }else{
        echo "<script>alert('Error al realizar el prestamo');</script>";
    }

}
mysqli_close($conn);
?>
