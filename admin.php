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
            <section>
                <div class="container col-lg-10">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'conexion.php';
                                $conecta = new Conexion();
                                $sql = "SELECT * FROM paciente";
                                $query = $conecta->prepare($sql);
                                $query -> execute();
                                $resultados = $query -> fetchAll(PDO::FETCH_OBJ);
                                if ($query->rowCount()>0){
                                    foreach($resultados as $item){
                                        echo "<tr>
                                        <td>".$item->Id."</td>
                                        <td>".$item->Nombre."</td>
                                        <td>".$item->Apellido."</td>
                                        <td>".$item->Direccion."</td>
                                        <td>".$item->Correo."</td>
                                        <tr>";
                                    }
                                }
                                else{
                                    echo "<tr><td>No hay datos</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
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