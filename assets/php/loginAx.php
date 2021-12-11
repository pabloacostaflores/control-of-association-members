<?php 
include("conexion.php");
if(isset($_POST['Log'])){
    $nombre = trim($_POST['IdPersona']);
    $pass = trim($_POST['Password']);
    $sql = "SELECT * FROM administrador WHERE idAdministrador = '1234567' and Contrasenia = 'contrasena";
    //echo $sql;
    $result = mysqli_query($conn, $sql);
    echo $result;
    if ($result) {
            session_start();
            header("location: ./../index.php");
        }
    else {
        echo "<script>alert('Error en la consulta');</script>";    
    }
}
?>
