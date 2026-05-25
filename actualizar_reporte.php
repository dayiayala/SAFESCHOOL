<?php

include("config/conexion.php");

$id = $_POST['id'];
$estado = $_POST['estado'];
$seguimiento = $_POST['seguimiento'];

$sql = "UPDATE reportes 
SET 
estado='$estado',
seguimiento='$seguimiento'
WHERE id='$id'";

if($conn->query($sql) === TRUE){

    header("Location: gestionar_reportes.php");

}else{

    echo "Error al actualizar";

}

?>