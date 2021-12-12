<?php 

include("assets/php/conexion.php");
if(isset($_POST['aniadir'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $contrato = $_POST['IdContrato'];
    if(isset($_POST['esSocio'])){
        $socio = 1;
        if(isset($_POST['esHeredero'])){
            $heredero = 1;
    }
}
    $sql = "INSERT INTO persona(idPersona, Nombre, Telefono, Dirreccion, EsSocio, EsHeredero) VALUES ('$contrato','$nombre','$telefono','$contrato','$socio','$heredero')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('Error');</script>";
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($conn));
            }
        }else{
            echo "<script>alert('Exito');</script>";
        }
        
    
}
mysqli_close($conn);
?>