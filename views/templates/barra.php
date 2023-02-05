<h1 class="pag-name">Citas</h1>
<p class="desc-pag">Admin</p>

<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a href="/logout" class="btn">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])){ ?>

    <div class="barra-servicios">
        <a class="btn" href="/admin">Ver citas</a>
        <a class="btn" href="/servicios">Servicios</a>
        <a class="btn" href="/servicios/crear">Crear Servicios</a>
    </div>

    <?php } ?>