<h1 class="pag-name">Recuperar Contraseña</h1>
<p class="desc-pag">Ingresa tu nueva contraseña</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form class="formulario"  method="POST">

    <div class="campo">
        <label for="password">Nueva Contraseña</label>
        <input 
        type="password"
        id="password"
        name="password"
        placeholder="Ingresa tu nueva contraseña"
        />
    </div>
    
    <input type="submit" value="Restablecer" class="btn">

</form>


<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/crear-cuenta">Crear cuenta</a>

</div>