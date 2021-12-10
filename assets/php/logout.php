<?php
    session_start();
    session_destroy();
    header("location:login.php"); //redirigimos a index
?>

