<?php

namespace Controllers;
use MVC\Router;

class LoginController{
    public static function login(Router $router){
        $router->render('auth/login', []);
    }

    public static function logout(){
        echo "Desde el logout";
    }

    public static function olvide(Router $router){
        $router->render('auth/olvide-password', [

        ]);
    }

    public static function crear(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo 'Mandaste el formulario';
        }
        
        $router->render('auth/crear-cuenta', [

        ]);
    }

    public static function recuperar(){
        echo "Desde el recuperar";
    }
}