<h1 class="nombre-pagina">Crear nueva cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<div class="app">
    <nav class="tabs">
        <button type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Información Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
    <div class="seccion" id="paso-1">
        <h2>Servicios</h2>
        <p class="text-center">Elije tus servicios a continuación</p>
        <div class="listado-servicios" id="servicios"></div>
    </div>
    <div class="seccion" id="paso-2">
        <h2>Tus Datos y cita</h2>
        <p class="text-center">Coloca tus datos y fecha de cita</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                id="nombre"
                type="text"
                placeholder="Tu Nombre"
                value="<?php echo $nombre ?>"
                >
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input 
                id="nombre"
                type="date"
                >
            </div>
            <div class="campo">
                <label for="hora">Hora</label>
                <input 
                id="hora"
                type="time"
                placeholder="Tu Nombre"
                >
            </div>
        </form>
    </div>
    <div class="seccion" id="paso-3">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>

        <button
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

<?php
    $script = "
        <script src='build/js/app.js'></script>
    ";
?>