<?php 

include("assets/php/conexion.php");

if (isset($_POST['act'])){
    $id = $_POST['idPersona'];
    $telefono = $_POST['nuevoTelefono'];
    //Validaciones
    if(empty($telefono)){
        echo "<script>alert('El telefono es obligatorio');</script>";
    }else{
    //Actualizar telefono de la persona
    $sql = "UPDATE persona SET Telefono = '$telefono' WHERE idPersona = '$id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('Error');</script>";
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($conn));
            }
    }
    else{
        echo "<script>alert('Exito');</script>";
    }
    }
}
mysqli_close($conn);
?>