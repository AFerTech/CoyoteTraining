<h1 class="pag-name">Login</h1>
<p class="desc-pag">Iniciar Sesión</p>

<?php include_once __DIR__ . "/../templates/alertas.php"; ?>

<form action="/" method="POST" class="form">
    <div class="campo">
        <label for="email">Correo Electronico</label>
        <input 
            type="email"
            id="email"
            placeholder="Correo Electronico"
            name="email"
            value="<?php echo s($auth->email);?>"
        />
    </div>  <!--Correo--> 

    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
            type="password"
            id="password"
            placeholder="Contraseña"
            name="password"
            />
    </div>

    <input type="submit" class="btn" value="Iniciar Sesión">
</form>

<div class="acciones">
    <a href="/crear-cuenta">Crear una cuenta</a>
    <a href="/recuperar">Recuperar contraseña</a>

</div>