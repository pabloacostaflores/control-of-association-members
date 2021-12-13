<?php 

include("assets/php/conexion.php");
if(isset($_POST['report'])){
    $fecha = $_POST['fecha'];
    $descripcion = $_POST['descripcion'];
    $acusado = $_POST['idAcusado']; 
    $sql = "INSERT INTO reportetoma(Fecha, Descripcion, Persona_idPersona) VALUES ('$fecha','$descripcion','$acusado')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Reporte enviado');</script>";
    }else{
        echo "<script>alert('Error al enviar el reporte');</script>";
    }
}
mysqli_close($conn);
?>