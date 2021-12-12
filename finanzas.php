<?php 

include("assets/php/conexion.php");
if(isset($_POST['Finanza'])){
    $monto = $_POST['monto'];
    $concepto = $_POST['fecha'];
    $fecha = $_POST['concepto'];
    //Obtener el id del usuario
    $id_usuario = $_SESSION['idPersona'];
    //Validar que los campos no esten vacios
    if(empty($monto) || empty($concepto) || empty($fecha)){
        echo "<script>alert('Todos los campos son obligatorios');</script>";
        header("Location: finanzas.php?error=1");
    }else{
    $sql = "INSERT INTO operacionesfinancieras(Monto, Fecha, Concepto, Administrador_idAdministrador) VALUES ('$monto','$concepto','$fecha','$id_usuario')";
    $result = mysqli_query($conn, $sql);
    if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
    }
    if ($result) {
        echo "<script>alert('Operacion realizada con exito');</script>";

    }
    else {
        echo "<script>alert('Error al realizar la operacion');</script>";
    }
}
}
mysqli_close($conn);
?>
