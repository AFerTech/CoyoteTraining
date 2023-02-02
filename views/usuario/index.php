<h1 class="pag-name">Citas</h1>
<p class="desc-pag">Elige tus servicios</p>

<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a href="/logout" class="btn">Cerrar Sesión</a>
</div>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Cita</button>
        <button type="button" data-paso="3">Resumen</button>

    </nav>

    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios</p>
        <div id="servicios" class="listado-servicio">
            
        </div>
    </div>
    
    <div id="paso-2" class="seccion ">
         <h2>Datos</h2>
         <p class="text-center">Coloca tus datos y fecha de tu cita</p> 
         
         <form  class="formulario">
             <div class="campo">
                 <label for="nombre">Nombre</label>
                 <input 
                 type="text"
                 id="nombre"
                 value="<?php echo $nombre; ?>"
                 disabled
                 />
             </div> <!--nombre-->
             <div class="campo">
                 <label for="fecha">Fecha</label>
                 <input 
                 type="date"
                 id="fecha"
                 min="2023-01-28"
                 min ="<?php echo date('Y-m-d', strtotime('+1 day'));  ?>"
                 />
             </div>
             <!--fecha-->
             <div class="campo">
                 <label for="hora">Hora</label>
                 <input 
                 type="time"
                 id="hora"
                 />
             </div><!--hora-->

             <input type="hidden" id="id" value="<?php echo $id; ?>">
             
         </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verificar que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button class="btn" id="anterior">
            &laquo; Regresar
        </button>

        <button class="btn" id="siguiente">
            Siguiente  &raquo;
        </button>
    </div>
</div>

<?php

    $script = 
    "
    <script src='build/js/app.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    ";

    

?>