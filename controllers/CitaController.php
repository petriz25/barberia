<?php

namespace Controllers;
use Model\Hora;
use MVC\Router;
use Model\Empleado;
use Model\Horarios;
use Model\AdminCita;

class CitaController{
    public static function index(Router $router){
        if(!isset($_SESSION)) {//evitar error de 'ignorar session'
            session_start();//se inicia session y se puede acceder a $_SESSION
        }; 

        isAut();

        $empleados = Empleado::all();
        $horas = Hora::all();
        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-', $fecha);

        //Consultar la base de datos
        $consulta = "SELECT horas.id, 
        horas.hora, 
        citas.id AS citaId,
        empleados.id as empleadoId,
        CONCAT( empleados.nombre, ' ', empleados.apellido) as empleado
        FROM horas 
        INNER JOIN empleados
    	ON 1 = 1
        LEFT JOIN citas
        ON citas.fecha = '${fecha}'
    	AND empleados.id = citas.empleadoId
    	AND citas.horaId = horas.id;";

        $citas = Horarios::SQL($consulta);
        debuguear($citas);

        $router->render('/cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'empleados' => $empleados, 
            'horas' => $horas, 
            'citas' => $citas
        ]);
    }
}