<h1 class="nombre-pagina">Reestablecer Contraseña</h1>
<p class="descripcion-pagina">Coloca tu nueva contraseña a continuación</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<?php if($error) return; ?>

<form method="POST" class="formulario">
    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
        type="password"
        id="password"
        placeholder="Tu Nueva Contraseña"
        name="password"
        >
    </div>

    <div class="acceso">
        <input type="submit" class="boton" value="Cambiar contraseña">
    </div>

    <div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
    </div>
</form>