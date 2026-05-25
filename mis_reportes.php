<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

include("config/conexion.php");

$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM reportes
        WHERE usuario='$usuario'
        ORDER BY id DESC";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Mis Reportes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
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

.estado{
    padding:5px 12px;
    border-radius:10px;
    color:white;
    font-size:14px;
}

.pendiente{
    background:orange;
}

.seguimiento{
    background:#2563eb;
}

.resuelto{
    background:green;
}

.material{
    background:#dc2626;
}

</style>

</head>

<body>

<div class="sidebar">

<h2>SafeSchool</h2>

<a href="dashboard.php">Dashboard</a>

<a href="reportar.php">Reportar Caso</a>

<a href="mis_reportes.php">Mis Casos</a>

<a href="logout.php">Cerrar Sesión</a>

</div>

<div class="content">

<h2 class="mb-4">
Mis Casos Reportados
</h2>

<div class="card shadow p-4">

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Título</th>
<th>Estado</th>
<th>Fecha</th>

</tr>

</thead>

<tbody>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td>
<?php echo $fila['id']; ?>
</td>

<td>
<?php echo $fila['titulo']; ?>
</td>

<td>

<?php

$estado = $fila['estado'];

if($estado == "Pendiente"){
    echo "<span class='estado pendiente'>Pendiente</span>";
}

elseif($estado == "En seguimiento"){
    echo "<span class='estado seguimiento'>En seguimiento</span>";
}

elseif($estado == "Solicitud de material probatorio"){
    echo "<span class='estado material'>Solicitud de material probatorio</span>";
}

elseif($estado == "Resuelto"){
    echo "<span class='estado resuelto'>Resuelto</span>";
}

?>

</td>

<td>
<?php echo $fila['fecha']; ?>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>