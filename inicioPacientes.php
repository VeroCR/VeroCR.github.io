<?php
include "php/usuario.php";
include "php/sesion.php";
$usuario = new Usuario();
$sesion = new Sesion();

if (isset($_SESSION['id'])) {
    if (!isset($_GET['rol'])) {
        $sesion->closeSession();
        header("location: index.html");
    } else {
        $rol = $_GET['rol'];
        if ($rol == "pac") {
            $usuario->setPaciente($sesion->getCurrentUser());
        } else if ($rol == "med") {
            header("location: inicioMedicos.php?rol=med");
        }
    }
} else {
    header("location: iniciarSesion.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>CMPH: Inicio Pacientes</title>
</head>
<!--Barra navegacion-->
<nav class="navbar navbar-expand-md sticky-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
            <img src="Assets/Logo CMPH.png" alt="logo" width="80">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="inicioPacientes.php?rol=pac">Inicio</a>
                <a class="nav-link" href="formCita.php?rol=pac">Registrar Cita</a>
                <a class="nav-link" href="consultarCitaPacientes.php?rol=pac">Consultar Cita</a>
                <a class="nav-link" href="php/salir.php">Salir</a>
            </div>
        </div>
    </div>
</nav>
<?php
$nombre = $usuario->getNombre();
$aPat = $usuario->getAPat();
$aMat = $usuario->getAMat();
echo "<h1 class='titulo'>Bienvenido $nombre $aPat $aMat</h1>
    <h1 class='titulo'>!Has ingresado como Paciente!</h1>";
?>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<footer>

</footer>

</html>