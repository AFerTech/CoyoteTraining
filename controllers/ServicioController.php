<?php

namespace Controllers;

use MVC\Router;

class ServicioController
{

    public static function index(Router $router){

        $router->render('/admin/servicios/index',[
            
        ]);
    }


    public static function crear(Router $router){
        echo "crear servicio";

        if($_SERVER['REQUEST_METHOD']=== 'POST'){

        }
    }

    public static function actualizar(Router $router){
        echo "actualizar servicio";

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            
        }
    }
    public static function eliminar(Router $router){
        echo "eliminar servicio";

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            
        }
    }

}

