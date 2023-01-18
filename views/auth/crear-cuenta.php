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
        value ="<?php  echo s($usuario->nombre); ?>"
        />
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
        type="text"
        id="apellido"
        name="apellido"
        placeholder="Apellido"
        value ="<?php  echo s($usuario->apellido); ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
        type="tel"
        id="telefono"
        name="telefono"
        placeholder="Telefono"
        value ="<?php  echo s($usuario->telefono); ?>"
        />
    </div>

    <div class="campo">
        <label for="correo electronico">Correo Electronico</label>
        <input 
        type="email"
        id="correo electronico"
        name="correo electronico"
        placeholder="Correo Electronico"
        value ="<?php  echo s($usuario->email); ?>"
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