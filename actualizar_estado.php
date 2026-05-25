<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['usuario']['rol'] != 'admin') {
    echo "Acceso denegado";
    exit();
}

$id = $_POST['id'];
$estado = $_POST['estado'];

$sql = "UPDATE reportes 
        SET estado='$estado'
        WHERE id='$id'";

mysqli_query($conexion, $sql);

echo "
<script>
alert('Estado actualizado correctamente');
window.location='gestionar_reportes.php';
</script>
";
?>