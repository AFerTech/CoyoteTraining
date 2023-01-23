<?php

namespace Model;

class Usuario extends ActiveRecord{

    // BD
    protected static $tabla = 'usuarios';
    protected static $columnasDB=[
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
        if(!$this->email){
            self::$alertas['error'][]= 'El campo Correo es obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][]= 'El campo Contraseña es obligatorio';

        }
        if(strlen($this->password) < 8){
            self::$alertas['error'][]= 'La contraseña debe contener minimo 8 caracteres';


        }
        return self::$alertas;
    }

    public function existeUsuario(){
        $query = " SELECT * FROM ". self::$tabla . " WHERE email ='" . $this->email . "' LIMIT 1";
        

        $resultado=self::$db->query($query);


        if($resultado->num_rows){
            self::$alertas['error'][]= "El usuario ya existe";
        }

        return $resultado;
        
    }
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function crearToken(){
        $this->token = uniqid();
    }

}
