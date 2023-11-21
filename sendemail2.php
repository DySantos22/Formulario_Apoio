<?php
session_start();

require 'conexao.php';

//Usando o PHPMailer
require_once __DIR__. '/lib/vendor/autoload.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__. '/lib/vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Pegando Chave de confirmação e email
$chave = $_SESSION['chave'];
$email = $_SESSION['email'];



//Instanciando a váriavel do email  
$mail = new PHPMailer(true);     //Instancia do PHPmailer

//Fazendo a ligação do email
try {
    //Configurações do servidor (gmail)
    
    $mail->isSMTP();      
    $mail->SMTPSecure = 'tls';                                  //Enviar usando TLS
    $mail->Host       = 'smtp.gmail.com';                     //Servidor usado
    $mail->SMTPAuth   = true;                                   //Ativando autenticacao SMTP
    $mail->Username   = '';                     //Usuario SMTP
    $mail->Password   = '';                        //Senha SMTP     
    $mail->Port       = 587;        //Porta usada para TLS

    //Aqui ele tira o erro do SSL e da conexão com o Host
    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    
    //quem envia e recebe
    $mail->setFrom('', '');  //Usuario SMTP e Nome aleatório
    $mail->addAddress($email);     //Email do Destinatario
    $mail->isHTML(true);                                  //Habilitando o uso do HTML
    $mail->charset = 'UTF-8';
    $mail->Subject = 'Confirmar Email';    //Titulo
    $mail->Body    = "Olá, seja bem vindo!!<br><br>Obrigado pelo seu apoio!!<br><br>Clique no link abaixo para confirmar seu e-mail:<br><br>
    <a href='http://localhost/confirmation.php?chave=$chave' target='_blank'>Clique Aqui!</a>";   //Corpo
    $mail->AltBody = "Olá, seja bem vindo!!\n\nObrigado pelo seu apoio!!\n\nClique no link abaixo para confirmar seu e-mail:\n\n
    <a href='http://localhost/confirmation.php?chave=$chave' target='_blank'>Clique Aqui!</a>";
  
    //Verificando envio do email
    if($mail->send()) {
        header('location: index.html');
    } else {
        header('location: index.html');
        }

} catch (Exception $e) {
    echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";   //Mensagem de erro, depois envia para o cadastro novamente
    header('location: index.html');
}

//Mandando os dados para o banco 
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<script src="js/sweetalert2.js"></script>
<script src="js/custom4.js"></script>
</body>
</html>
