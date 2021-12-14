<?php 

include("assets/php/conexion.php");
if(isset($_POST['aniadir'])){
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $contrato = $_POST['IdContrato'];
    $coordX = $_POST['coorx'];
    $coordY = $_POST['coory'];
    $socio = 0;
    $heredero = 0;
    if(isset($_POST['esSocio'])){
        $socio = 1;
        if(isset($_POST['esHeredero'])){
            $heredero = 1;
    }
}
    $sql = "INSERT INTO persona(idPersona, Nombre, coordX,coordY,Telefono,  EsSocio, EsHeredero) VALUES ('$contrato','$nombre','$coordX','$coordY','$telefono','$socio','$heredero')";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "<script>alert('Error');</script>";
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($conn));
            }
        }else{
            echo "<script>alert('Exito');</script>";
            //Sacar el  mes actual
            $mes = date("m");
            //Sacar el año actual
            $anio = date("Y");
            //0 es no hecha, 1 es con pago y 2 es con presencia
            //Hacer 5 inserts una por cada mes
            $i=0;
            while($i<5){
                $sql = "INSERT INTO actividades(Mes, Anio, Estatus,idPersona) VALUES ('$mes','$anio','0','$contrato')";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    echo "<script>alert('Error');</script>";
                    if ( false===$result ) {
                        printf("error: %s\n", mysqli_error($conn));
                        }
                    }else{
                        echo "<script>alert('Exito');</script>";
                        $mes++;
                        if($mes>12){
                            $mes=1;
                            $anio++;
                        }
                    }
                $i++;
            }

        }
        
    
}
mysqli_close($conn);
?>