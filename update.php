<?php
    include 'conexion.php';
    $connect = new Conexion();
    $sql = "UPDATE paciente SET apellido='Gonzales' where id=3";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    header("Location: home.php");
    exit();
?>