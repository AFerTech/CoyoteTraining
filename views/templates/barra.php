
<!-- Admin -->
<?php if(isset($_SESSION['admin'])){ ?>
    <h1 class="pag-name">Citas</h1>
    <p class="desc-pag">Admin</p>

    <div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a href="/logout" class="btn">Cerrar Sesión</a>
    </div>



    <div class="barra-servicios">
        <a class="btn" href="/servicios">Ver Servicios</a>
        <a class="btn" href="/servicios/crear">Crear Servicios</a>
        <a class="btn" href="/servicios/crear">Servicios</a>
    </div>

    <?php }else{ ?>

        
<!-- Usuario -->
    <h1 class="pag-name">Citas</h1>
    <p class="desc-pag">Bienvenido</p>

    <div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a href="/logout" class="btn">Cerrar Sesión</a>
    </div>

    <?php }  ?>