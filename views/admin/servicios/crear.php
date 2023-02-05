<h1 class="pag-name">Servicios</h1>
<p class="desc-pag">Administración de servicios</p>
<h2>Crear Servicio</h2>

<?php include_once __DIR__ . "/../templates/barra.php"; ?>
<?php include_once __DIR__ . '/../../templates/alertas.php'; ?>


<form action="/servicios/crear" method="POST" class="formulario"> 

    <?php include_once __DIR__. "/formulario.php";?>

    <input type="submit" class="btn" value="Guardar">
</form>