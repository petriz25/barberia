<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer();

        //Configurar SMTP
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '2233e2af5ccd2d';
        $mail->Password = '6087cb472267b2';
        $mail->SMTPSecure = 'tls'; //Transport Layer Security
        $mail->Port = 2525;

        //Configurar el contenido del e-mail
        $mail->setFrom('cuentas@barberia.com');
        $mail->addAddress('cuentas@barberia.com.com', 'TheBarberSpa.com');
        $mail->Subject = ('Confirma tu cuenta');

        //Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        //Definir contenido 
        $contenido =  '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en 
        The Barber Spa, solo debes confirmarla dando click en el siguiente enlace </p>";
        $contenido .= "<p> Presiona aquí: <a href='http://Localhost:4000/confirmar-cuenta?token="
        . $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaaje </p>"; 
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //Enviar email
        $mail->send();
    }
}