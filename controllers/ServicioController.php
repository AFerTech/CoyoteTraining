<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;

class ServicioController
{

    public static function index(Router $router){

        $router->render('/admin/servicios/index',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id']
        ]);
    }


    public static function crear(Router $router){

        // creando el obj vacio para poder pasarlo a las vitas
        $servicio = new Servicio;
        $alertas =[];
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            // sincronizando el obj con lo que se trae del metodo post
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();

            if(empty($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
            }
        }


        $router->render('/admin/servicios/crear',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id'],
            'servicio' => $servicio,
            'alertas' => $alertas
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

