<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
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

        $alertas =[];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarCuentaNueva();


            if(empty($alertas)){
                // verificar que el usuario no existe
                $resultado= $usuario->existeUsuario();
                if($resultado->num_rows){
                    $alertas = Usuario::getAlertas();
                }else{
                    // has password
                    $usuario->hashPassword();
                    // generar token
                    $usuario->crearToken();
                    
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);

                    $email->enviarConfirmacion();

                    // crear usuario
                    $resultado = $usuario->guardar();
                    // debuguear($usuario);

                    if($resultado){
                        header('Location: /mensaje');
                    }
                    
                }
            }
        }
        $router->render('auth/crear-cuenta',[
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
    public static function mensaje (Router $router){
        $router->render('auth/mensaje');    
    }

    
}