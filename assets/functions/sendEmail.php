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
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'user@example.com';
    $mail->Password   = 'password';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    //Envia email ao Cliente
    //Remetente
    $mail->setFrom('from@example.com', 'Mailer'); //Remetente
    $mail->addReplyTo('info@example.com', 'Information'); // responder para

    //Destinatário
    $mail->addAddress($dadosForm['email'], $dadosForm['nome']);    

    //Configuração do email
    $mail->isHTML(true); // Aceita HTML
    $mail->Subject =utf8_decode("Mesagem de contato recebida");
    $body = utf8_decode("Prezado(a) " . $dadosForm['nome'] . "<br><br>
    Recebemos sua mensagem. <br> Será lido o mais rápido possível.<br> Em breve será respondido.<br>
    Assunto: " . $dadosForm['assunto'] . "<br> Conteúdo: " . $dadosForm['mensg']);

    $mail->Body    = $body;
    //$mail->AltBody = utf8_decode($dadosForm['mensg'] . "Enviado Via PHPMailer.\n");
    $mail->send();

    /***/

    //Envia email ao Colaborador

    $mail->ClearAllRecipients(); //Limpar todos os que destinatiarios: TO, CC, BCC
    //Remetente
    $mail->setFrom('from@example.com', 'Mailer'); //Remetente
    $mail->addReplyTo('info@example.com', 'Information'); // responder para

    //Destinatário
    $mail->addAddress("ellen@example.com", "ADM");     

    //Configuração do email
    $mail->isHTML(true); // Aceita HTML
    $mail->Subject =utf8_decode($dadosForm['assunto'] . " Mesagem via site recebida");
    $body2 = utf8_decode("Prezado(a)  Colaborador(a), Recebemos a mensagem de: <br>"
    ."Nome: " . $dadosForm['nome'] . "<br>
      E-mail: " . $dadosForm['email'] .
    "<br> Assunto: " . $dadosForm['assunto'] . 
    "<br> Conteúdo: " . $dadosForm['mensg'] . " <br> <strong>Por favor responder o mais breve possível</strong>");

    $mail->Body    = $body2;
    //$mail->AltBody = utf8_decode($dadosForm['mensg'] . "Enviado Via PHPMailer.\n");
    $mail->send();

    echo '<script>alert("Email Enviado");</script>';
    echo '<script>window.location.href = "../../index.php";</script>';
   

    
} catch (Exception $e) {
    echo '<script>alert("A mensagem não pôde ser enviada. Erro de correspondência: {$mail->ErrorInfo}");</script>';
}
}