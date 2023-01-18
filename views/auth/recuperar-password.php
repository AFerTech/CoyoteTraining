<h1 class="pag-name">Recuperar Contraseña</h1>
<p class="desc-pag">Ingresa el correo electronico registrado en la cuenta para poder restablecer tu contraseña</p>

<form class="formulario" action="/recuperar" method="POST">

    <div class="campo">
        <label for="correo electronico">Correo Electronico</label>
        <input 
        type="email"
        id="correo electronico"
        name="correo electronico"
        placeholder="Correo Electronico"
        />
    </div>
</form>

<input type="submit" valiue="Recuperar" class="btn">

<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/crear-cuenta">Crear cuenta</a>

</div>