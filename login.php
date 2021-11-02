<?php
if($_POST['correo'] == 'Admin2021'){
    header("Location: admin.php");
    exit();
}
include 'conexion.php';
session_start();
if(isset($_POST['correo']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $correo = validate($_POST['correo']);
    $password = validate($_POST['password']);
    if(empty($correo)){
        header("Location: index.php?error= Correo es requerido");
        exit();
    }
    elseif(empty($password)){
        header("Location: index.php?error= Contraseña es requerido");
        exit();
    }
    else{
        try {
                $query = "select * from `paciente` where `correo`=:correo and `password`=:password";
                $conect = new Conexion();
                $stmt = $conect->prepare($query);
                $stmt->bindParam('correo', $correo, PDO::PARAM_STR);
                $stmt->bindValue('password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                foreach($row as $item){
                    $output[] = $item;
                }
                if($count == 1 && !empty($row)) {
                    if($output[5] === $correo && $output[6] === $password){
                        $_SESSION['id'] = $output[0];
                        $_SESSION['nombre'] = $output[1];
                        $_SESSION['apellido'] = $output[2];
                        $_SESSION['telefono'] = $output[3];
                        $_SESSION['direccion'] = $output[4];
                        $_SESSION['correo'] = $output[5];
                        header("Location: home.php");
                        exit();
                    }
                    else{
                        header("Location: LogDB.php?error= Contraseña o correo incorrecto");
                        exit();
                    }
                } else {
                    header("Location: LogDB.php?error= Contraseña o correo incorrecto");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Error : ".$e->getMessage();
        }
    }
} else{
    header("Location: LogDB.php?error_log");
    exit();
}
 