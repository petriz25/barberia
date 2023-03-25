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

        $data = [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ];

        $router->render('/cita/index', $data);
    }
}