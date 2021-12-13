<?php 

include("assets/php/conexion.php");
if(isset($_POST['inventario'])){
    date_default_timezone_set('America/Mexico_City');
            $fecha = date('Y-m-d');
    $cantidad = $_POST['cantidad'];  
    $Objeto = $_POST['invt'];
    
    if($Objeto == "Otros"){
        $monto   = $_POST['monto'];
        $nombre = $_POST['nombreObjecto'];
        $descripcion = $_POST['Descripcion'];
        $sql = "INSERT INTO objeto (Nombre, Descripcion, Cantidad) VALUES ('$nombre', '$descripcion', '$cantidad')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Objeto agregado');</script>";
        }else{
            echo "<script>alert('Error al agregar objeto');</script>";
        }
        $montotal = $monto * $cantidad;
        //Id del bot = 0
        $sql4 = "INSERT INTO operacionesfinancieras(Monto, Fecha, Concepto, Administrador_idAdministrador) VALUES ('$montotal','$fecha','Operacion en Inventario','0')";
        $result4 = mysqli_query($conn, $sql4);
        if($result4){
            echo "<script>alert('Operacion agregada a finanzas');</script>";
        }else{
            echo "<script>alert('Error al agregar operacion a finanzas');</script>";
        }
    }else{ 
        //Valida si hay stock
        $sql = "SELECT Cantidad FROM objeto WHERE idObjeto = '$Objeto'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $stock = $row['Cantidad'];
        if($stock >= $cantidad){
            $valor = '0';
            $idAdmin = $_SESSION['idPersona'];
            //Obtenemos la fecha de hoy segun mi huso horario
            date_default_timezone_set('America/Mexico_City');
            $fecha = date('Y-m-d');
            $sql2 = "INSERT INTO operacioninventario(Cantidad, FechaOperacion, Valor, Administrador_idAdministrador, Objeto_idObjeto) VALUES ('$cantidad','$fecha','$valor','$idAdmin','$Objeto')";
            $result2 = mysqli_query($conn, $sql2);
            if($result2){
                echo "<script>alert('Operacion agregada');</script>";
            }else{
                echo "<script>alert('Fallo al agregar');</script>";
            }
            if($cantidad<0){
                $sql3 = "UPDATE objeto SET Cantidad = Cantidad + '$cantidad' WHERE idObjeto = '$Objeto'";
                $result3 = mysqli_query($conn, $sql3);
                if($result3){
                    echo "<script>alert('Objeto actualizado');</script>";
                }else{
                    echo "<script>alert('Error al actualizar objeto');</script>";
                }
        }
        }
        else{
            echo "<script>alert('No hay stock suficiente');</script>";
        }
    }
}
mysqli_close($conn);
?>
