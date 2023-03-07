<?php

namespace Controllers;
use MVC\Router;
use Model\Empleado;

class CitaController{
    public static function index(Router $router){
        if(!isset($_SESSION)) {//evitar error de 'ignorar session'
            session_start();//se inicia session y se puede acceder a $_SESSION
        }; 

        isAut();

        $empleados = Empleado::all();

        $router->render('/cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'empleados' => $empleados
        ]);
    }
}