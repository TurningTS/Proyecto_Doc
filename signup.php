<?php
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    include 'conexion.php';
    $conecta = new Conexion();
    $sql = "INSERT INTO paciente(Nombre, Apellido, Telefono, Direccion, Correo, Password) VALUES(:nombre, :apellido, :telefono, :direccion, :correo, :password)";
    $query = $conecta->prepare($sql);
    $query -> bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $query -> bindParam(':apellido',$apellido,PDO::PARAM_STR);
    $query -> bindParam(':telefono',$telefono,PDO::PARAM_STR);
    $query -> bindParam(':direccion',$direccion,PDO::PARAM_STR);
    $query -> bindParam(':correo',$correo,PDO::PARAM_STR);
    $query -> bindParam(':password',$password,PDO::PARAM_STR);
    $query -> execute();
    $ultimoID = $conecta -> lastInsertId();

    header("Location: Registro.php?success= Registro exitoso");
    exit();
?>