<?php 
include("assets/php/conexion.php");
if(isset($_POST['rep'])){
    $fecha = $_POST['fechaRep'];
    $descripcion = $_POST['descripcionRep'];
    $acusado = $_POST['idContrato']; 
    $sql = "INSERT INTO reparaciontoma(Fecha, Descripcion, Persona_idPersona) VALUES ('$fecha','$descripcion','$acusado')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Reparacion enviada');</script>";
    }else{
        echo "<script>alert('Error al enviar la reparacion');</script>";
    }
}
mysqli_close($conn);
?>