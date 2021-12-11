<?php 
session_start();
include("assets/php/conexion.php");
if(isset($_POST['Log'])){
    $nombre = $_POST['IdPersona'];
    $pass = $_POST['Password'];
    $sql = "SELECT * FROM administrador WHERE IdAdministrador = '$nombre' AND Contrasenia = '$pass'";
   // echo $sql;
    $result = mysqli_query($conn, $sql);
    if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
    }
    if ($result) {
        $fila = mysqli_num_rows($result);
        if ($fila==1) {
            header("location: index.php");
        }
        else {
            echo "Usuario o contraseña incorrectos";
        }
    }
    else {
        echo "<script>alert('Error en la consulta');</script>";    
    }
}
mysqli_close($conn);
?>