<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<h1 class="nombre-pagina">Crear nueva cita</h1>

<div id="datos" data-datos="{{ json_encode($data) }}"></div>

<div class="app">
    <nav class="tabs">
        <button type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Información Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
    <div class="seccion" id="paso-1">
        <p class="text-center">Elige tus servicios a continuación</p>
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
                <label for="empleado">Barber</label>
                <select id="empleados">
                    <option value="">-- Opcional --</option>
                    <?php foreach($empleados as $empleado):  ?>
                        <option id="empleado" value="<?php echo $empleado->id ?>">
                        <?php echo s($empleado->nombre) . " " . s($empleado->apellido); ?> 
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input 
                id="fecha"
                type="date"
                min="<?php echo date('Y-m-d'); ?>"
                >
            </div>
            <div class="formulario__campo">
                <label class="formulario__label">Seleccionar Hora</label>
                <ul class="horas" id="horarios">
                
                </ul>
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>">
        </form>
    </div>
    <div class="seccion contenido-resumen" id="paso-3">
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

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" 
integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" 
crossorigin="anonymous"></script>

<?php
    $script = "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>