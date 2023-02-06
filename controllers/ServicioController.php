<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;

class ServicioController
{

    public static function index(Router $router){
        isAdmin();
        $servicios = Servicio::all();
        $router->render('/admin/servicios/index',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id'],
            'servicios' => $servicios
        ]);
    }


    public static function crear(Router $router){
        isAdmin();

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
        isAdmin();

        // validar el id que se obtiene sea numerico
        if(!is_numeric($_GET['id'])) return;

        // pasando el id al obj servicio para buscarlo en la bd
        $servicio =Servicio::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();
            if(empty($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('/admin/servicios/actualizar',[
            'nombre' => $_SESSION['nombre'],
            'id'  => $_SESSION['id'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar(){
        isAdmin();

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $id = $_POST['id'];
            $servicio= Servicio::find($id);
            $servicio->eliminar();

            header('Location: /servicios');
        }
       
    }

}

