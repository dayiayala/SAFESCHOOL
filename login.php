<?php
session_start();
include("config/conexion.php");

$error = "";

if($_POST){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios
            WHERE correo='$correo'
            AND password='$password'";

    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){

        $usuario = $resultado->fetch_assoc();

        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Correo o contraseña incorrectos";

    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Iniciar Sesión | SafeSchool</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins', sans-serif;
    min-height:100vh;
    background:
    linear-gradient(rgba(15,23,42,.85), rgba(30,41,59,.92)),
    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920&auto=format&fit=crop');
    background-size:cover;
    background-position:center;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.login-container{
    width:100%;
    max-width:1000px;
    display:grid;
    grid-template-columns:1fr 1fr;
    background:white;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.35);
}

.left-side{
    background:linear-gradient(135deg,#2563eb,#1e3a8a);
    color:white;
    padding:60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    position:relative;
}

.left-side::before{
    content:"";
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
    top:-70px;
    right:-70px;
}

.left-side::after{
    content:"";
    position:absolute;
    width:180px;
    height:180px;
    background:rgba(255,255,255,.05);
    border-radius:50%;
    bottom:-50px;
    left:-50px;
}

.logo{
    font-size:40px;
    font-weight:700;
    margin-bottom:20px;
    z-index:1;
}

.descripcion{
    font-size:17px;
    line-height:1.8;
    z-index:1;
}

.features{
    margin-top:40px;
    z-index:1;
}

.feature{
    margin-bottom:20px;
    display:flex;
    align-items:center;
    gap:12px;
    font-size:15px;
}

.icon{
    width:40px;
    height:40px;
    background:rgba(255,255,255,.15);
    border-radius:12px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:18px;
}

.right-side{
    padding:60px 50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.titulo{
    font-size:34px;
    font-weight:700;
    color:#0f172a;
    margin-bottom:10px;
}

.subtitulo{
    color:#64748b;
    margin-bottom:35px;
}

.form-control{
    height:55px;
    border-radius:14px;
    border:1px solid #cbd5e1;
    padding-left:15px;
    margin-bottom:20px;
    font-size:15px;
}

.form-control:focus{
    box-shadow:none;
    border-color:#2563eb;
}

.btn-login{
    height:55px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    font-weight:600;
    font-size:16px;
    transition:.3s;
}

.btn-login:hover{
    transform:translateY(-2px);
    background:linear-gradient(135deg,#1d4ed8,#1e40af);
}

.extra-links{
    margin-top:25px;
    text-align:center;
}

.extra-links a{
    text-decoration:none;
    color:#2563eb;
    font-weight:500;
}

.alert{
    border-radius:12px;
}

@media(max-width:900px){

    .login-container{
        grid-template-columns:1fr;
    }

    .left-side{
        display:none;
    }

    .right-side{
        padding:40px 30px;
    }

}

</style>

</head>

<body>

<div class="login-container">

    <!-- PANEL IZQUIERDO -->
    <div class="left-side">

        <div class="logo">
            🛡️ SafeSchool
        </div>

        <p class="descripcion">
            Plataforma ética y segura para reportar situaciones escolares
            de manera responsable, confidencial y organizada.
        </p>

        <div class="features">

            <div class="feature">
                <div class="icon">🔒</div>
                Reportes protegidos y confidenciales
            </div>

            <div class="feature">
                <div class="icon">📚</div>
                Ambiente escolar más seguro
            </div>

            <div class="feature">
                <div class="icon">⚡</div>
                Gestión rápida de casos
            </div>

        </div>

    </div>

    <!-- LOGIN -->
    <div class="right-side">

        <h1 class="titulo">
            Bienvenido
        </h1>

        <p class="subtitulo">
            Inicia sesión para acceder al sistema SafeSchool
        </p>

        <?php if($error != ""){ ?>

        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>

        <?php } ?>

        <form method="POST">

            <input
                type="email"
                name="correo"
                class="form-control"
                placeholder="Correo electrónico"
                required
            >

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Contraseña"
                required
            >

            <button class="btn btn-login w-100">
                Ingresar al sistema
            </button>

        </form>

        <div class="extra-links mt-4">

            ¿No tienes cuenta?
            <a href="registro.php">
                Registrarse
            </a>

        </div>

    </div>

</div>

</body>
</html>