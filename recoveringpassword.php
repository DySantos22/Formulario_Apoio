<?php
//Conexao com BD
require 'conexao.php';

if(isset($_POST['nova_senha'])){
//Pegando os dados
$email = $_POST['email'];
$senha = $_POST['nova_senha'];

//Criptografando a senha
$hash = password_hash($senha, PASSWORD_BCRYPT);

//BD
$sql = "UPDATE usuario SET senha = '$hash' WHERE Email = '$email'";

//Pegando resultado
$result = $conn->query($sql);

//Se houver resultado 
if($conn->query($sql) === TRUE){
    include 'boxes/sucessrecovering.html';
    header('refresh:4; url=login.html');
}else{
    header('location: login.html');
}
}else{
    header('location: login.html');
}
?>