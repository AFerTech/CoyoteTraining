<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;


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

        $usuario = new Usuario();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario->sincronizar($_POST);


        }
        $router->render('auth/crear-cuenta',[
            'usuario' => $usuario
        ]);
    }

    
}