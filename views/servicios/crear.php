<h1 class="nombre-pagina">Crear Servicios</h1>
<p class="descripcion-pagina">Administración de servicios</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" action="/servicios/crear" class="formulario">
    <?php include_once __DIR__ . '/formulario.php';  ?>

    <input type="submit" value="Guardar Servicio" class="boton">
</form>