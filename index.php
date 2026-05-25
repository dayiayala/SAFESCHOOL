<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SafeSchool | Plataforma Ética Escolar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/estilos.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    background:#f4f7fb;
    overflow-x:hidden;
}

/* NAVBAR */

.navbar{
    background:rgba(7,16,36,0.95);
    backdrop-filter:blur(10px);
    padding:15px 0;
}

.navbar-brand{
    font-size:28px;
    font-weight:700;
    color:white !important;
}

.nav-link{
    color:white !important;
    margin-left:20px;
    transition:0.3s;
}

.nav-link:hover{
    color:#60a5fa !important;
}

/* HERO */

.hero{
    min-height:100vh;
    background:
    linear-gradient(rgba(4,15,40,0.82), rgba(4,15,40,0.88)),
    url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1600&auto=format&fit=crop');
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    color:white;
    position:relative;
}

.hero::after{
    content:"";
    position:absolute;
    bottom:0;
    left:0;
    width:100%;
    height:120px;
    background:linear-gradient(to top,#f4f7fb,transparent);
}

.hero-content{
    position:relative;
    z-index:2;
}

.badge-safe{
    background:#2563eb;
    padding:10px 20px;
    border-radius:30px;
    display:inline-block;
    margin-bottom:20px;
    font-size:14px;
}

.hero h1{
    font-size:65px;
    font-weight:700;
    line-height:1.1;
}

.hero p{
    font-size:20px;
    max-width:700px;
    margin:auto;
    margin-top:20px;
    margin-bottom:35px;
    color:#dbeafe;
}

.btn-main{
    background:#2563eb;
    border:none;
    padding:15px 35px;
    font-size:18px;
    border-radius:50px;
    transition:0.3s;
    color:white;
    text-decoration:none;
    margin-right:10px;
}

.btn-main:hover{
    background:#1d4ed8;
    transform:translateY(-3px);
}

.btn-outline-custom{
    border:2px solid white;
    padding:15px 35px;
    border-radius:50px;
    color:white;
    text-decoration:none;
    transition:0.3s;
}

.btn-outline-custom:hover{
    background:white;
    color:#0f172a;
}

/* INFO SECTION */

.info{
    padding:100px 0;
}

.title-section{
    text-align:center;
    margin-bottom:60px;
}

.title-section h2{
    font-size:42px;
    font-weight:700;
    color:#0f172a;
}

.title-section p{
    color:#64748b;
    margin-top:15px;
}

/* CARDS */

.card-safe{
    background:white;
    border-radius:25px;
    padding:40px 30px;
    text-align:center;
    transition:0.4s;
    height:100%;
    border:none;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.card-safe:hover{
    transform:translateY(-10px);
}

.icon-box{
    width:90px;
    height:90px;
    background:#dbeafe;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    margin-bottom:25px;
    font-size:40px;
}

.card-safe h3{
    color:#0f172a;
    margin-bottom:15px;
    font-weight:600;
}

.card-safe p{
    color:#64748b;
}

/* SECTION 2 */

.section-dark{
    background:#0f172a;
    color:white;
    padding:100px 0;
}

.section-dark h2{
    font-size:45px;
    font-weight:700;
}

.section-dark p{
    color:#cbd5e1;
    margin-top:20px;
    line-height:1.8;
}

.stats{
    margin-top:40px;
}

.stat-box{
    background:rgba(255,255,255,0.08);
    border-radius:20px;
    padding:25px;
    text-align:center;
}

.stat-box h3{
    font-size:40px;
    font-weight:700;
}

.stat-box span{
    color:#cbd5e1;
}

/* FOOTER */

footer{
    background:#020617;
    color:white;
    text-align:center;
    padding:25px;
}

@media(max-width:768px){

.hero h1{
    font-size:45px;
}

.hero p{
    font-size:17px;
}

}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">

<div class="container">

<a class="navbar-brand" href="#">
SafeSchool
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="#inicio">Inicio</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#funciones">Funciones</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#seguridad">Seguridad</a>
</li>

<li class="nav-item">
<a class="nav-link" href="login.php">Ingresar</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- HERO -->

<section class="hero text-center" id="inicio">

<div class="container hero-content">

<div class="badge-safe">
Plataforma Escolar Inteligente
</div>

<h1>
Construyendo escuelas <br>
más seguras y humanas
</h1>

<p>
SafeSchool permite reportar situaciones escolares de forma segura,
confidencial y organizada, fortaleciendo la convivencia estudiantil
y la prevención del bullying.
</p>

<div>

<a href="login.php" class="btn-main">
Iniciar Sesión
</a>

<a href="registro.php" class="btn-outline-custom">
Crear Cuenta
</a>

</div>

</div>

</section>

<!-- FUNCIONES -->

<section class="info" id="funciones">

<div class="container">

<div class="title-section">

<h2>
¿Por qué usar SafeSchool?
</h2>

<p>
Una plataforma moderna enfocada en la seguridad y bienestar escolar.
</p>

</div>

<div class="row g-4">

<div class="col-md-4">

<div class="card-safe">

<div class="icon-box">
🛡️
</div>

<h3>
Reportes Seguros
</h3>

<p>
Los estudiantes pueden reportar situaciones de manera protegida y confidencial.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card-safe">

<div class="icon-box">
📊
</div>

<h3>
Gestión Inteligente
</h3>

<p>
Administradores y docentes pueden dar seguimiento organizado a cada caso.
</p>

</div>

</div>

<div class="col-md-4">

<div class="card-safe">

<div class="icon-box">
🤝
</div>

<h3>
Convivencia Escolar
</h3>

<p>
Fomenta ambientes escolares más sanos, responsables y libres de acoso.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- SEGURIDAD -->

<section class="section-dark" id="seguridad">

<div class="container">

<div class="row align-items-center">

<div class="col-md-6">

<h2>
Tecnología al servicio de la ética escolar
</h2>

<p>
SafeSchool nace con el propósito de ayudar a las instituciones educativas
a detectar, gestionar y prevenir situaciones que afectan la convivencia.
La plataforma promueve una cultura de respeto, empatía y apoyo dentro
del entorno académico.
</p>

<div class="row stats g-3">

<div class="col-4">

<div class="stat-box">

<h3>24/7</h3>

<span>Disponibilidad</span>

</div>

</div>

<div class="col-4">

<div class="stat-box">

<h3>100%</h3>

<span>Confidencial</span>

</div>

</div>

<div class="col-4">

<div class="stat-box">

<h3>+Seg</h3>

<span>Protección</span>

</div>

</div>

</div>

</div>

<div class="col-md-6 text-center">

<img
src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png"
class="img-fluid"
style="max-width:450px;"
>

</div>

</div>

</div>

</section>

<!-- FOOTER -->

<footer>

<p class="mb-0">
© 2026 SafeSchool | Plataforma Ética Escolar
</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>