<?php 

include("assets/php/conexion.php");

if(isset($_GET['pago'])){
    $id_pago = $_GET['pago'];
    $sql = "UPDATE actividades SET Estatus=1 WHERE idActividades='$id_pago'";
    
    $resultado = mysqli_query($conn, $sql);
    if(!$resultado){
        echo "<script>alert('Error en el pago');</script>";
        echo mysqli_error($conn);
    }
    else{
        $monto = 30;
        $concepto = "Pago de actividad";
        //Obtener la fecha de hoy huso horario de Mexico
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('Y-m-d');
        $sql4 = "INSERT INTO operacionesfinancieras(Monto, Fecha, Concepto, Administrador_idAdministrador) VALUES ('$monto','$fecha','Pago de Faena','0')";
        $resultado2 = mysqli_query($conn, $sql4);
        if(!$resultado2){
            echo "<script>alert('Error en el pago');</script>";
            //Mostrar el error
            echo mysqli_error($conn);
        }
        else{
            echo "<script>alert('Pago hecho');</script>";
            
            //Seleccionar id de la ultima actividad con la id del usuario
            $sql3 = "SELECT Mes,Anio,idPersona FROM actividades WHERE idActividades = $id_pago";
            $resultado3 = mysqli_query($conn, $sql3);
            if(!$resultado3){
                echo "<script>alert('Error en la consulta de la actividad');</script>";
                //Mostrar el error
                echo mysqli_error($conn);
            }
            else {
                $row = mysqli_fetch_array($resultado3);
                $mes = $row['Mes'];
                $anio = $row['Anio'];
                $id_persona = $row['idPersona'];
                $mes = $mes + 4;
                if($mes >12){
                    $mes = $mes%12;
                    $mes = $mes + 1;
                    $anio = $anio + 1;
                }
                $sql2 = "INSERT INTO actividades(Mes, Anio,Estatus, idPersona) VALUES ('$mes','$anio','0','$id_persona')";
                $resultado2 = mysqli_query($conn, $sql2);
                if(!$resultado2){
                    echo "<script>alert('Error en la consulta de la actividad');</script>";
                    //Mostrar el error
                    echo mysqli_error($conn);
                }
                else{
                    echo "<script>alert('Actividad registrada');</script>";
                    echo "<script>window.location.href='calendario.php';</script>";
                }
            }
        }
    }
}
if(isset($_GET['asistencia'])){
    $id_pago = $_GET['asistencia'];
    $sql = "UPDATE actividades SET Estatus=2 WHERE idActividades='$id_pago'";
    $resultado = mysqli_query($conn, $sql);
    if(!$resultado){
        echo "<script>alert('Asistencia incorrecta');</script>";
        echo mysqli_error($conn);
    }
    else{
            echo "<script>alert('Asistencia registrada');</script>";
            $sql3 = "SELECT Mes,Anio,idPersona FROM actividades WHERE idActividades = $id_pago";
            $resultado3 = mysqli_query($conn, $sql3);
            if(!$resultado3){
                echo "<script>alert('Error en la consulta de la actividad');</script>";
                //Mostrar el error
                echo mysqli_error($conn);
            }
            else {
                $row = mysqli_fetch_array($resultado3);
                $mes = $row['Mes'];
                $anio = $row['Anio'];
                $id_persona = $row['idPersona'];
                $mes = $mes + 4;
                if($mes >12){
                    $mes = $mes%12;
                    $mes = $mes + 1;
                    $anio = $anio + 1;
                }
                $sql2 = "INSERT INTO actividades(Mes, Anio,Estatus, idPersona) VALUES ('$mes','$anio','0','$id_persona')";
                $resultado2 = mysqli_query($conn, $sql2);
                if(!$resultado2){
                    echo "<script>alert('Error en la consulta de la actividad');</script>";
                    //Mostrar el error
                    echo mysqli_error($conn);
                }
                else{
                    echo "<script>alert('Actividad registrada');</script>";
                    echo "<script>window.location.href='calendario.php';</script>";
                }
            }
            echo "<script>window.location.href='calendario.php';</script>";
    }

}

mysqli_close($conn);
?>
