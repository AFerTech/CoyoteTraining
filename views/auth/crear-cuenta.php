<h1 class="pag-name">Crear cuenta</h1>
<p class="desc-pag">descripcion</p>

<form action="/crear-cuenta" class="formulario" method="POST">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
        type="text"
        id="nombre"
        name="nombre"
        placeholder="Nombre"
        />
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
        type="text"
        id="apellido"
        name="apellido"
        placeholder="Apellido"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
        type="tel"
        id="telefono"
        name="telefono"
        placeholder="Telefono"
        />
    </div>

    <div class="campo">
        <label for="correo electronico">Correo Electronico</label>
        <input 
        type="email"
        id="correo electronico"
        name="correo electronico"
        placeholder="Correo Electronico"
        />
    </div>

    <div class="campo">
        <label for="contraseña">Contraseña</label>
        <input 
        type="password"
        id="contraseña"
        name="contraseña"
        placeholder="Contraseña"
        />
    </div>

    <input type="submit" class="btn" value="Crear Cuenta">
</form>

<div class="acciones">
    <a href="/">Iniciar Sesión</a>
    <a href="/recuperar">Recuperar contraseña</a>

</div>