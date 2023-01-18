<?php

namespace Model;

class Usuario extends ActiveRecord{

    // BD
    protected static $tabla = 'usuarios';
    protected static $columnDB=[
        'id',
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'admin',
        'confirmado',
        'token'
    ];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;


    public function __construct($args = []){

        $this->id = $args['id']  ?? null;
        $this->nombre = $args['nombre']  ?? '';
        $this->apellido = $args['apellido']  ?? '';
        $this->email = $args['email']  ?? '';
        $this->password = $args['password']  ?? '';
        $this->telefono = $args['telefono']  ?? '';
        $this->admin = $args['admin']  ?? 0;
        $this->confirmado = $args['confirmado']  ?? 0;
        $this->token = $args['token']  ?? '';

    }

    // validacion al crear cuenta
    public function validarCuentaNueva(){
        if(!$this->nombre){
            self::$alertas['error'][]= 'El campo nombre es obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][]= 'El campo apellido es obligatorio';
        }
        return self::$alertas;
    }

}
