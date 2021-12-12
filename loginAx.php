<?php 
session_start();
include("assets/php/conexion.php");

if(isset($_POST['Logi'])){
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
            //Consulta para obtener el Id del cargo del usuario
            $sql2 = "SELECT Cargo_idCargo FROM administrador WHERE IdAdministrador = '$nombre'";
            $result2 = mysqli_query($conn, $sql2);
            if ( false===$result2 ) {
            printf("error: %s\n", mysqli_error($conn));
            }
            $fila2 = mysqli_fetch_row($result2);
            $cargo = $fila2[0];
            $_SESSION['idCargo'] = $cargo;
            $_SESSION['idPersona'] = $nombre;
            echo "Redireccionandp";
            header("location: index.php");
        }
        else {
            echo "Usuario o contraseña incorrectos";
        }
    }
else {
    echo "Error al conectar con la base de datos";
}
}
mysqli_close($conn);
?>