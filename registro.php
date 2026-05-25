<?php
include 'config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $anonimo = $_POST['anonimo'];
    $rol = $_POST['rol'];

    // SI ES ANÓNIMO
    if($anonimo == "si"){

        $nombre = "Anónimo";
        $correo = "anonimo".rand(1000,9999)."@safeschool.com";
        $password = "anonimo";

        $sql = "INSERT INTO usuarios(nombre, correo, password, rol)
                VALUES('$nombre', '$correo', '$password', '$rol')";

        if ($conn->query($sql)) {

            header("Location: reportar.php");
            exit();

        } else {

            echo "Error: " . $conn->error;
        }

    } else {

        // SI DESEA REGISTRARSE
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $password = $_POST['contraseña'];

        $sql = "INSERT INTO usuarios(nombre, correo, password, rol)
                VALUES('$nombre', '$correo', '$password', '$rol')";

        if ($conn->query($sql)) {

            echo "<script>
                    alert('Usuario registrado correctamente');
                    window.location='login.php';
                  </script>";

        } else {

            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro SafeSchool</title>

<style>

body{
    font-family: Arial;
    background: linear-gradient(to right, #2563eb, #1e3a8a);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.contenedor{
    background:white;
    width:400px;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    color:#1e3a8a;
}

input, select{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:1px solid #ccc;
    border-radius:8px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:8px;
    background:#2563eb;
    color:white;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

label{
    font-weight:bold;
}

</style>
</head>

<body>

<div class="contenedor">

<form method="POST">

    <h2>Registro SafeSchool</h2>

    <label>¿Desea realizar el reporte de forma anónima?</label>

    <select name="anonimo" id="anonimo" onchange="mostrarCampos()" required>
        <option value="no">No</option>
        <option value="si">Sí</option>
    </select>

    <div id="datosRegistro">

        <input type="text" name="nombre" placeholder="Nombre completo">

        <input type="email" name="correo" placeholder="Correo electrónico">

        <input type="password" name="contraseña" placeholder="Contraseña">

    </div>

    <select name="rol" required>
        <option value="">Seleccione un rol</option>
        <option value="estudiante">Estudiante</option>
        <option value="docente">Docente</option>
        <option value="orientador">Orientador</option>
    </select>

    <button type="submit">Continuar</button>

</form>

</div>

<script>

function mostrarCampos(){

    let anonimo = document.getElementById("anonimo").value;
    let datos = document.getElementById("datosRegistro");

    if(anonimo == "si"){

        datos.style.display = "none";

    } else {

        datos.style.display = "block";
    }
}

</script>

</body>
</html>