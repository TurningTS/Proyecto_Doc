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
    <body class="home">
        <header>
            <nav class="navbar fixed-top navbar-expand-md scrolling-navbar justify-content-end">
                <a href="home.php" class="nav-link">Perfil</a>
                <a href="cita.php" class="nav-link">Citas</a>
                <a href="logout.php" class="nav-link">Cerrar sesión</a>
            </nav>
            <div class="view homeb">
            </div>
        </header>
        <main class="py-5" id="scroll">
            <div class="container col-lg-10 border">
                <h1>Bienvenido/a</h1>
                <h3>Datos Generales</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <p>Nombre(s): <?php echo $_SESSION['nombre'];?></p>
                        <p>Apellidos: <?php echo $_SESSION['apellido'];?></p>
                        <p>Telefono: <?php echo $_SESSION['telefono'];?></p>
                        <p>Dirección: <?php echo $_SESSION['direccion'];?></p>
                        <p>Correo: <?php echo $_SESSION['correo'];?></p>
                    </div>
                    <div class="col-sm-6">
                        <?php if(isset($_POST['check'])) {?>
                            <p>¿Que datos desea modificar?</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-input" name="Cnombre" value="1">
                                    <label for="Cnombre" class="form-check-label">Nombre</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-input" name="Capellido" value="2">
                                    <label for="Capellido" class="form-check-label">Apellido</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-input" name="Ctelefono" value="3">
                                    <label for="Ctelefono" class="form-check-label">Telefono</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-input" name="Cdireccion" value="4">
                                    <label for="Cdireccion" class="form-check-label">Dirección</label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-input" name="Cmail" value="5">
                                    <label for="Cmail" class="form-check-label">Correo</label>
                                </div>
                            </form>
                        <?php }?>
                        <?php if(isset($_POST['update'])){ ?>
                            <form action="update.php">
                                <div class="form-group">
                                    <label>Nombre(s)</label>
                                    <input type="text" class="form-control" placeholder="Nombre(s)" name="nombre">
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="number" class="form-control" placeholder="Telefono" name="telefono">
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" placeholder="Dirección" name="direccion">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="email" class="form-control" placeholder="@" name="correo">
                                </div>
                                <input type="submit" value="Registrarse" class="btn btn-primary">
                            </form>
                        <?php }?>
                    </div>
                    <div class="col-sm-10">
                        <p style="float: right;">¿Desea modificar sus datos?</p>
                    </div>
                    <form method="post">
                        <input type="submit" value="Update" class="btn btn-primary" name="check"> 
                    </form>
                </div>
            </div>
            <form action="update.php" method="post">
                <input type="submit" value="Update">
            </form>
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
        header("Location: LogDB.php?error= Tiempo de sesion expirado");
        exit();
    }
?>