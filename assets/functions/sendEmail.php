<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Carregando Composer autoloader
require '../lib/vendor/autoload.php';

$dadosForm = $_POST;

if(isset($dadosForm['SendAddMsg'])){

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'user@example.com';
    $mail->Password   = 'password';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //Envia email ao Cliente
    //Remetente
    $mail->setFrom('user@example.com', 'Mailer'); //Remetente
    $mail->addReplyTo('user@example.com', 'Mailer'); // responder para

    //Destinatário
    $mail->addAddress($dadosForm['email'], $dadosForm['nome']);     //Add a recipient

    //Configuração do email
    $mail->isHTML(true); // Aceita HTML
    $mail->Subject =utf8_decode("Mesagem de contato recebida");
    $body = utf8_decode("Prezado(a) " . $dadosForm['nome'] . "<br><br>
    Recebemos sua mensagem. <br> Será lido o mais rápido possível.<br> Em breve será respondido.<br>
    Assunto: " . $dadosForm['assunto'] . "<br> Conteúdo: " . $dadosForm['mensg']);

    $mail->Body    = $body;
    //$mail->AltBody = utf8_decode($dadosForm['mensg'] . "Enviado Via PHPMailer.\n");
    $mail->send();
    echo 'Email Enviado';
   

    
} catch (Exception $e) {
    echo "A mensagem não pôde ser enviada. Erro de correspondência: {$mail->ErrorInfo}" . $e->getMessage();
}
}