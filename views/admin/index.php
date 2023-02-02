<?php
    include_once __DIR__ . '/../templates/barra.php'
?>

<h2>Buscar citas</h2>
<div class="busqueda">
    <form class="formulario" action="">
        <label for="fecha">Fecha</label>
        <div class="campo">
            <input 
            type="date"
            id="fecha"
            name="fecha">
        </div>
    </form>
</div>
<div id="citas-admin">Citas</div>