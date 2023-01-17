<?php

namespace Controllers;

use MVC\Router;


class LoginController
{
    public static function login(Router $router){
        $router->render('auth/login');
    }

    public static function logout(){
        echo "Desde logout";
    }
    public static function recuperar(){
        echo "Desde recuperar";
    }
    public static function recuperado(){
        echo "Desde recuperado";
    }

    public static function crear(){
        echo "Desde crear cuenta";
    }
    
}