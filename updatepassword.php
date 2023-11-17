<?php
session_start();

//Conectando com o BD
require 'conexao.php';

 if(isset($_POST['nova_senha'])){
// Pegando os dados
$email = $_POST['email'];
$senha = $_POST['nova_senha'];

// Senha criptografada
$hash = password_hash($senha, PASSWORD_BCRYPT);

//Atualizando senha no BD
$sql = "UPDATE usuario SET Senha = '$hash' WHERE Email = '$email'";

//Pegando informações do usuario
$sql2 = "SELECT * FROM usuario WHERE Email='$email'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

//Colocando informações na SESSION
$_SESSION['email'] = $email;
$_SESSION['chave'] = $row2['Chave'];

//Buscando Conexao
$result = $conn->query($sql);

//Se conectou com sucesso
if($conn->query($sql) === TRUE){
    include 'sucesseditpassword.html';
    header('refresh:4;url=sendemail2.php');
}else{
    //Se deu erro na aplicação
    echo 'Erro ao cadastrar sua senha!';
    header('refresh:0;url=login.html');
}

 }
 //Fecha a conexao
 $conn->close();
?>