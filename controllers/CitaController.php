<?php

namespace Controllers;
use Model\Hora;
use MVC\Router;
use Model\Empleado;
use Model\Horarios;
use Model\AdminCita;
use Model\HorarioEmpleado;

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
        $empleado = $_GET['idEmpleado'] ?? 0;
        $horarioEmpleado = HorarioEmpleado::all();

        //Consultar la base de datos
        $consulta = "SELECT * FROM horarioempleado WHERE empleadoId = ${empleado} ;";
        $horarios = HorarioEmpleado::SQL($consulta);

        $data = [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'empleados' => $empleados, 
            'horas' => $horas, 
            'horarios' => $horarios
        ];

        $router->render('/cita/index', $data);
    }
}