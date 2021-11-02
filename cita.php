<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['correo'])){

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>DoctorReserva</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/mdb.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-md scrolling-navbar justify-content-end">
                <a href="home.php" class="nav-link">Perfil</a>
                <a href="cita.php" class="nav-link">Citas</a>
                <a href="logout.php" class="nav-link">Cerrar sesión</a>
            </nav>
            <div class="view home">
                <div class="flex-center">
                    <a href="#scroll" class="btn">Citas</a>
                </div>
            </div>
        </header>
        <main class="py-5" id="scroll">
            <div class="container col-lg-10 border">
                <h1>Bienvenido/a</h1><br>
                <h3>Datos Generales</h3>
                <p>Nombre(s): <?php echo $_SESSION['nombre'];?></p>
                <p>Apellidos: <?php echo $_SESSION['apellido'];?></p>
                <p>Telefono: <?php echo $_SESSION['telefono'];?></p>
                <p>Dirección: <?php echo $_SESSION['direccion'];?></p>
                <p>Correo: <?php echo $_SESSION['correo'];?></p>
            </div>
        </main>
        <footer class="footer bg-primary py-2">
            <div class="container text-light">
                <p>Link</p>
                <nav class="justify-content">
                    <a href="https://www.un.org/es/coronavirus" class="text-light"><u>Mas información</u></a>
                </nav>
                <hr style="background-color: white;">
                <p>&copy;2021 DoctorReserva</p>
            </div>
        </footer>
        <script src="js/scroll.js"></script>
    </body>
</html>
<?php
}   else {
        header("Location: LogDB.php");
        exit();
    }
?>