<?php


namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;


class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

            $mail = new PHPMailer();
        
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'b24060f102443e';
            $mail->Password = 'bd2d8f40cab3fc';

            $mail->setFrom('CoyoteTraining');
            $mail->addAddress('Cuentas@coyotetraining.com', 'CoyoteTraining.com');
            $mail->Subject = 'Confirmar cuenta';

            $mail->isHTML(TRUE);
            $mail->CharSet='UTF-8'; 

            $contenido = "<html>";
            $contenido .= "<p><strong>Hola ".$this->nombre ."</strong>
            Gracias por crear tu cuenta en CoyoteTraining, da click 
            en el siguiente enlace para terminar de crear tu cuenta
            </p>";
            $contenido.= "<p>Da click en el siguiente enlace: <a href='http://localhost:3000/confirmar?token=
            ".$this->token."'Confirmar Cuenta</a></p>"; 
            $contenido .= "<p>Si usted no ha creado una cuenta, puede ignorar este mensaje</p>";
            $contenido .= "</html>";
            $mail->Body = $contenido;

            $mail->send();
        } catch (Exception $e){
            echo "Correo no enviado. Error: {$mail->ErrorInfo}";
        }
    }
}