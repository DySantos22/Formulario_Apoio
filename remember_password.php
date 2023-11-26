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

if(isset($_POST['email_lembrar'])){

//Pegando email do usuario 
$email = $_POST['email_lembrar'];

//Buscando no BD
$sql = "SELECT * FROM usuario WHERE Email = '$email'";
    //Procurando o resultado
    $result = $conn->query($sql);
    //Se houver linha no BD
    if($result->num_rows> 0){

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
    $mail->Subject = 'Troca de Senha';    //Titulo
    $mail->Body    = "Olá, Tudo bem?<br><br>Recebemos aqui seu pedido para a troca de sua senha!<br><br>Clique no link abaixo para realizar a troca da senha: <br><br>
    <a href='http://localhost/remember_password2.php?email=$email' target='_blank'>Clique Aqui!</a>";   //Corpo
    $mail->AltBody = "Olá, Tudo bem?\n\nRecebemos aqui seu pedido para a troca de sua senha!\n\nClique no link abaixo para realizar a troca da senha:\n\n
    <a href='http://localhost/remember_password2.php?email=$email' target='_blank'>Clique Aqui!</a>";
  
    //Verificando envio do email
    if($mail->send()) {
        include 'boxes/sucessremember.html';
        header('refresh:4;url=login.html');
    } else {
        header('location: login.html');
        }

} catch (Exception $e) {
    echo "Mensagem não foi enviada. ERRO: {$mail->ErrorInfo}";   //Mensagem de erro, depois envia para o cadastro novamente
    header('location: login.html');
}
    }else{
        include 'boxes/inexistemail.html';
        header('refresh:4;url=login.html');
    }
}else{
    header('location: login.html');
}
//Mandando os dados para o banco 
mysqli_close($conn);

?>