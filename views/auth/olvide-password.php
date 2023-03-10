<h1 class="nombre-pagina">Olvide contraseña</h1>
<p class="descripcion-pagina">Restablece tu contraseña escribiendo tu email a continuación</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/olvide" method="POST" class="formulario">

    <div class="campo">
        <label for="email">Email</label>
        <input 
        type="email"
        id="email"
        placeholder="Tu Email"
        name="email"
        >
    </div>

    <input type="submit" class="boton" value="Restablecer Contraseña">

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
    </div>
</form>