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
    public static function recuperar(Router $router){
        $router->render('auth/recuperar-password',[
            
        ]);
    }
    public static function recuperado(){
        echo "Desde recuperado";
    }

    public static function crear(Router $router){
        $router->render('auth/crear-cuenta',[

        ]);
    }

    
}