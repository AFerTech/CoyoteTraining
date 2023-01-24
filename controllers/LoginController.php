<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;


class LoginController
{
    public static function login(Router $router){
        $alertas = [];
        $auth = new Usuario;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $auth = new Usuario($_POST);

            $alertas=$auth->validarLogin();
            
            if(empty($alertas)){
                // buscar al usuario en la bd por su email
                $usuario = Usuario::where('email', $auth->email);
                
                
                if($usuario){
                    if( $usuario->verificacionPassword($auth->password)){
                        session_start();
                        
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['admin'] = $usuario->admin;
                        $_SESSION['login'] = true;

                        // redireccionar
                        if($usuario->admin==="1"){

                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');

                        }else{
                            header('Location: /cita');
                        }
                    }
                }else{
                    Usuario::setAlerta('error','Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login',[
            'alertas' => $alertas,
            'auth' => $auth  
        ]);

        
        
        
    }

    public static function logout(){
        echo "Desde logout";
    }
    public static function recuperar(Router $router){
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas=$auth->validarEmail();

            if(empty($alertas)){
                $usuario = Usuario::where('email', $auth->email);

                if($usuario && $usuario->confirmado==="1"){
                    // generar token
                    $usuario->crearToken();
                    $usuario->guardar();

                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->emailRecuperar      ();

                    Usuario::setAlerta('exito','Se ha enviado un mensaje al correo para recuperar la contraseña');
                }else{
                    Usuario::setAlerta('error','El usuario no existe o no esta confirmado');
                }
            }


        }
        $alertas= Usuario::getAlertas();

        $router->render('auth/recuperar-password',[
            'alertas' => $alertas
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
    public static function confirmar (Router $router){
        $alertas = [];

        $token = s($_GET['token']);

       $usuario= Usuario::where('token', $token);

        if(empty($usuario)){
            Usuario::setAlerta('error', 'Token no valido');
        }else{
            $usuario->confirmado = 1;
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta confirmada correctamente');
        }
        $alertas = Usuario::getAlertas();
       $router->render('auth/confirmar-cuenta',[
            'alertas' => $alertas
        ]);
    }

    
}