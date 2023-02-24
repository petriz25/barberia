<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/crear-cuenta" method="POST" class="formulario">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
        type="text"
        id="nombre"
        placeholder="Tu nombre"
        name="nombre"
        value="<?php echo s($usuario->nombre); ?>";
        >
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
        type="text"
        id="apellido"
        placeholder="Tu Apellido"
        name="apellido"
        value="<?php echo s($usuario->apellido); ?>"
        >
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
        type="tel"
        id="telefono"
        placeholder="Tu Telefono"
        name="telefono"
        value="<?php echo s($usuario->telefono); ?>"
        max=10;
        >
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input 
        type="email"
        id="email"
        placeholder="Tu Email"
        name="email"
        value="<?php echo s($usuario->email); ?>"
        >
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
        type="password"
        id="password"
        placeholder="Tu Contraseña"
        name="password"
        value="<?php echo s($usuario->password); ?>"
        >
    </div>

    <input type="submit" class="boton" value="Crear cuenta">

    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
        <a href="/olvide">¿Olvidaste tu contraseña?</a>
    </div>
</form>