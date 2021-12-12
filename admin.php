<?php 

include("assets/php/conexion.php");
if(isset($_POST['add'])){
    $id = $_POST['idPersonaNuevo'];
    $contra = $_POST['contra'];  
    $ccontra = $_POST['repiteContra'];
    //Cargo se obtiene el ID del dropbox 
    $cargo = $_POST['cargos'];
    //validar que las contraseñas sean iguales
    if($contra == $ccontra && $contra != "" && !empty($id)){
        $sql = "INSERT INTO administrador( Contrasenia,  Cargo_idCargo, Persona_idPersona) VALUES ('$contra','$cargo','$id')";
        $resultado = mysqli_query($conn, $sql);
        if($resultado){
            echo "<script>alert('Administrador registrado con exito');</script>";
        }else{
            echo "<script>alert('Error al registrar, verifique la ID');</script>";
        }
    }
    else{
        echo "<script>alert('Las contraseñas no coinciden');</script>";
    }
}
mysqli_close($conn);
?>