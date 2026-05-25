<?php

session_start();
include("config/conexion.php");

$mensaje = "";

// VALIDAR SI ES ANÓNIMO
$anonimo = false;

if(!isset($_SESSION['usuario'])){
    $anonimo = true;
}

if($_POST){

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // SI ES ANÓNIMO
    if($anonimo){
        $usuario = "Anónimo";
    } else {
        $usuario = $_SESSION['usuario'];
    }

    $imagen = "";

    // SUBIR IMAGEN
    if(isset($_FILES['imagen']) && $_FILES['imagen']['name'] != ""){

        $nombreArchivo = time() . "_" . $_FILES['imagen']['name'];

        $ruta = "uploads/" . $nombreArchivo;

        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)){

            $imagen = $nombreArchivo;

        }
    }

    // INSERTAR REPORTE
    $sql = "INSERT INTO reportes
    (titulo, descripcion, usuario, imagen, estado)
    VALUES
    ('$titulo','$descripcion','$usuario','$imagen','Pendiente')";

    if($conn->query($sql) === TRUE){

        $mensaje = "Reporte enviado correctamente";

    } else {

        $mensaje = "Error al enviar reporte";

    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Reportar Caso</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
    font-family:Arial;
}

.navbar{
    background:#1e3a8a;
}

.card{
    border:none;
    border-radius:15px;
}

.btn-success{
    background:#16a34a;
    border:none;
}

.btn-success:hover{
    background:#15803d;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark">

<div class="container-fluid">

<a class="navbar-brand fw-bold">
SafeSchool
</a>

<div>

<?php if(!$anonimo){ ?>

<a href="dashboard.php" class="btn btn-light">
Dashboard
</a>

<a href="logout.php" class="btn btn-danger">
Cerrar Sesión
</a>

<?php } ?>

</div>

</div>

</nav>

<!-- CONTENIDO -->

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow p-4">

<h2 class="mb-3 text-center">
Nuevo Reporte
</h2>

<p class="text-muted text-center">
Puedes reportar situaciones de bullying,
acoso o problemas escolares.
</p>

<?php if($anonimo){ ?>

<div class="alert alert-warning text-center">

Estás realizando un reporte anónimo.

</div>

<?php } ?>

<?php if($mensaje != ""){ ?>

<div class="alert alert-success">

<?php echo $mensaje; ?>

</div>

<?php } ?>

<form method="POST" enctype="multipart/form-data">

<label class="form-label">
Título del caso
</label>

<input
type="text"
name="titulo"
class="form-control mb-3"
placeholder="Ej: Acoso en el salón"
required
>

<label class="form-label">
Descripción
</label>

<textarea
name="descripcion"
class="form-control mb-3"
rows="5"
placeholder="Describe lo sucedido..."
required
></textarea>

<label class="form-label">
Evidencia (opcional)
</label>

<input
type="file"
name="imagen"
class="form-control mb-4"
>

<button class="btn btn-success w-100">

Enviar Reporte

</button>

</form>

</div>

</div>

</div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>