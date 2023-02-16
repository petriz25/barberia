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

    public static function olvide(){
        echo "Desde el olvide";
    }

    public static function recuperar(){
        echo "Desde el recuperar";
    }
}