<div class="sidebar">

<h2>SafeSchool</h2>

<a href="dashboard.php">
🏠 Dashboard
</a>

<?php if($_SESSION['rol'] != "admin"){ ?>

<a href="reportar.php">
📝 Reportar Caso
</a>

<a href="mis_reportes.php">
📂 Mis Reportes
</a>

<?php } ?>

<?php if($_SESSION['rol'] == "admin"){ ?>

<a href="reportes.php">
📋 Gestionar Reportes
</a>

<?php } ?>

<a href="logout.php">
🚪 Cerrar Sesión
</a>

</div>