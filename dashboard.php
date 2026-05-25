<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

include("config/conexion.php");

$pendientes = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM reportes WHERE estado='Pendiente'"));

$seguimiento = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM reportes WHERE estado='En seguimiento'"));

$resueltos = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM reportes WHERE estado='Resuelto'"));

$rol = $_SESSION['rol'];
$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Dashboard SafeSchool</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/estilos.css">

<style>

body{
    background:#f4f6f9;
    font-family:Arial;
}

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    background:#1e3a8a;
    padding-top:20px;
}

.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#2563eb;
}

.content{
    margin-left:250px;
    padding:30px;
}

.card-dashboard{
    color:white;
    padding:25px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.bg-blue{
    background:#2563eb;
}

.bg-green{
    background:#16a34a;
}

.bg-red{
    background:#dc2626;
}

footer{
    background:#020617;
    color:white;
    text-align:center;
    padding:25px;
}
</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<h2>SafeSchool</h2>

<a href="dashboard.php">Dashboard</a>

<?php if($rol != "admin"){ ?>

<a href="reportar.php">Reportar Caso</a>

<a href="mis_reportes.php">Mis Casos</a>

<?php } ?>

<?php if($rol == 'admin') { ?>

    <a href="reportes.php">
        Gestionar Reportes
    </a>

<?php } ?>

<a href="logout.php">Cerrar Sesión</a>

</div>

<!-- CONTENIDO -->

<div class="content">

<h1>
Bienvenido <?php echo $_SESSION['usuario']; ?>
</h1>

<p class="text-muted">
Panel principal del sistema SafeSchool
</p>

<!-- DASHBOARD ADMIN -->

<?php if($rol == "admin"){ ?>

<?php

// TOTAL REPORTES
$total = $conn->query("SELECT COUNT(*) total FROM reportes");
$totalReportes = $total->fetch_assoc()['total'];

// TOTAL USUARIOS
$usuarios = $conn->query("SELECT COUNT(*) total FROM usuarios");
$totalUsuarios = $usuarios->fetch_assoc()['total'];

?>

<div class="row g-4 mt-2">

<div class="col-md-4">

<div class="card-dashboard bg-blue">

<h4>Total Reportes</h4>

<h1><?php echo $totalReportes; ?></h1>

</div>

</div>

<div class="col-md-4">

<div class="card-dashboard bg-green">

<h4>Usuarios Registrados</h4>

<h1><?php echo $totalUsuarios; ?></h1>

</div>

</div>

<div class="col-md-4">

<div class="card-dashboard bg-red">

<h4>Sistema</h4>

<h1>Activo</h1>

</div>

</div>

</div>

<?php } ?>

<!-- DASHBOARD ESTUDIANTE Y DOCENTE -->

<?php if($rol != "admin"){ ?>

<?php

$misReportes = $conn->query("
SELECT COUNT(*) total 
FROM reportes 
WHERE usuario='$usuario'
");

$totalMisReportes = $misReportes->fetch_assoc()['total'];

?>

<div class="row g-4 mt-2">

<div class="col-md-4">

<div class="card-dashboard bg-blue">

<h4>Mis Reportes</h4>

<h1><?php echo $totalMisReportes; ?></h1>

</div>

</div>

<div class="col-md-4">

<div class="card-dashboard bg-green">

<h4>Rol</h4>

<h1><?php echo ucfirst($rol); ?></h1>

</div>

</div>

<div class="col-md-4">

<div class="card-dashboard bg-red">

<h4>Sistema</h4>

<h1>Activo</h1>

</div>

</div>

</div>

<?php } ?>

<!-- ACCESOS RÁPIDOS -->

<div class="card shadow p-4 mt-5">

<h3>Accesos rápidos</h3>

<div class="mt-3">

<?php if($rol != "admin"){ ?>

<a href="reportar.php" class="btn btn-success">
Nuevo Reporte
</a>

<a href="mis_reportes.php" class="btn btn-primary">
Mis Reportes
</a>

<?php } ?>

<?php if($rol == "admin"){ ?>

<a href="reportes.php" class="btn btn-dark">
Gestionar Reportes
</a>

<?php } ?>

</div>

</div>

<!-- GRÁFICA SOLO ADMIN -->

<?php if($rol == "admin"){ ?>

<div class="card shadow p-4 mt-5">

<h3>Estadísticas</h3>

<canvas id="grafica"></canvas>

</div>

<?php } ?>

</div>

<?php if($rol == "admin"){ ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('grafica');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pendientes', 'En seguimiento', 'Resueltos'],
        datasets: [{
            label: 'Reportes',
            data: [
                <?php echo $pendientes; ?>,
                <?php echo $seguimiento; ?>,
                <?php echo $resueltos; ?>
            ]
        }]
    }
});
</script>

<?php } ?>



</body>
</html>