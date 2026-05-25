<?php

session_start();
include("config/conexion.php");

// VALIDAR LOGIN
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

// VALIDAR ADMIN
if($_SESSION['rol'] != "admin"){
    echo "Acceso denegado";
    exit();
}

// CAMBIAR ESTADO
if(isset($_GET['estado']) && isset($_GET['id'])){

    $id = $_GET['id'];
    $estado = $_GET['estado'];

    $sqlEstado = "UPDATE reportes 
    SET estado='$estado'
    WHERE id='$id'";

    $conn->query($sqlEstado);

    header("Location: reportes.php");
    exit();
}

// ELIMINAR REPORTE
if(isset($_GET['eliminar'])){

    $idEliminar = $_GET['eliminar'];

    $sqlEliminar = "DELETE FROM reportes
    WHERE id='$idEliminar'";

    $conn->query($sqlEliminar);

    header("Location: reportes.php");
    exit();
}

// GUARDAR SEGUIMIENTO
if(isset($_POST['guardar'])){

    $id = $_POST['id'];
    $estado = $_POST['estado'];
    $seguimiento = $_POST['seguimiento'];

    $sqlUpdate = "UPDATE reportes 
    SET estado='$estado',
    seguimiento='$seguimiento'
    WHERE id='$id'";

    $conn->query($sqlUpdate);

    header("Location: reportes.php");
    exit();
}

// BUSCADOR
$busqueda = "";

if(isset($_GET['buscar'])){
    $busqueda = $_GET['buscar'];
}

$sql = "SELECT * FROM reportes
WHERE titulo LIKE '%$busqueda%'
OR descripcion LIKE '%$busqueda%'
ORDER BY id DESC";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Gestión de Reportes</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#eef2f7;
    font-family:Arial;
}

.container{
    margin-top:40px;
    margin-bottom:40px;
}

.titulo{
    font-weight:bold;
    color:#1e3a8a;
}

.table{
    background:white;
    border-radius:15px;
    overflow:hidden;
}

.preview-img{
    width:100px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
}

textarea{
    resize:none;
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

<div class="container">

<div class="d-flex justify-content-between align-items-center mb-4">

<h1 class="titulo">
Panel de Gestión de Reportes
</h1>

<a href="dashboard.php" class="btn btn-dark">
Volver al Dashboard
</a>

</div>

<div class="card shadow p-4">

<form method="GET" class="mb-4">

<div class="row">

<div class="col-md-10">

<input
type="text"
name="buscar"
class="form-control"
placeholder="Buscar reporte..."
value="<?php echo $busqueda; ?>"
>

</div>

<div class="col-md-2">

<button class="btn btn-primary w-100">
Buscar
</button>

</div>

</div>

</form>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Usuario</th>
<th>Descripción</th>
<th>Estado</th>
<th>Seguimiento</th>
<th>Imagen</th>
<th width="320">Acciones</th>

</tr>

</thead>

<tbody>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td>
<?php echo $fila['id']; ?>
</td>

<td>

<?php
if($fila['usuario'] == ""){
    echo "Anónimo";
}else{
    echo $fila['usuario'];
}
?>

</td>

<td>
<?php echo $fila['descripcion']; ?>
</td>

<td>

<?php

if($fila['estado'] == "Pendiente"){

    echo "<span class='badge bg-warning text-dark'>Pendiente</span>";

}else if($fila['estado'] == "En seguimiento"){

    echo "<span class='badge bg-primary'>En seguimiento</span>";

}else if($fila['estado'] == "Solicitud de material probatorio"){

    echo "<span class='badge bg-info text-dark'>Material probatorio</span>";

}else{

    echo "<span class='badge bg-success'>Resuelto</span>";

}

?>

</td>

<td>

<?php

if($fila['seguimiento'] == ""){
    echo "Sin seguimiento";
}else{
    echo $fila['seguimiento'];
}

?>

</td>

<td>

<?php if($fila['imagen'] != ""){ ?>

<img
src="uploads/<?php echo $fila['imagen']; ?>"
class="preview-img"
>

<?php }else{ ?>

Sin imagen

<?php } ?>

</td>

<td>

<form method="POST">

<input
type="hidden"
name="id"
value="<?php echo $fila['id']; ?>"
>

<select
name="estado"
class="form-select mb-2"
required
>

<option value="Pendiente"
<?php if($fila['estado']=="Pendiente") echo "selected"; ?>>
Pendiente
</option>

<option value="En seguimiento"
<?php if($fila['estado']=="En seguimiento") echo "selected"; ?>>
En seguimiento
</option>

<option value="Solicitud de material probatorio"
<?php if($fila['estado']=="Solicitud de material probatorio") echo "selected"; ?>>
Solicitud de material probatorio
</option>

<option value="Resuelto"
<?php if($fila['estado']=="Resuelto") echo "selected"; ?>>
Resuelto
</option>

</select>

<textarea
name="seguimiento"
class="form-control mb-2"
rows="3"
placeholder="Escribe aquí el seguimiento..."
><?php echo $fila['seguimiento']; ?></textarea>

<button
type="submit"
name="guardar"
class="btn btn-primary w-100 mb-2"
>
Guardar Gestión
</button>

<a
href="reportes.php?eliminar=<?php echo $fila['id']; ?>"
class="btn btn-danger w-100"
onclick="return confirm('¿Eliminar reporte?')"
>
Eliminar
</a>

</form>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>