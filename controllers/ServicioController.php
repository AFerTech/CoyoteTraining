<?php

namespace Controllers;

use MVC\Router;

class ServicioController
{

    public static function index(Router $router){

        $router->render('/admin/servicios/index',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id']
        ]);
    }


    public static function crear(Router $router){

        if($_SERVER['REQUEST_METHOD']=== 'POST'){

        }
        $router->render('/admin/servicios/crear',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id']
        ]);
    }

    public static function actualizar(Router $router){

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            
        }
        $router->render('/admin/servicios/actualizar',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id']
        ]);
    }
    public static function eliminar(Router $router){

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            
        }
        $router->render('/admin/servicios/eliminar',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id']
        ]);
    }

}

