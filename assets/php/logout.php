<?php
    session_start();
    unset($_SESSION["login"]);
    header("location:login.html"); //redirigimos a index
?>

