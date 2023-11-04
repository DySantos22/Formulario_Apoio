<?php

include 'conexao.php';

// Pegando os dados

$indicacao = $_POST["indicacao"];
$nome = $_POST["nome"];
$apelido = $_POST["apelido"];
$whatsapp = $_POST["whatsapp"];
$email = $_POST["email"];
$data = $_POST["data"];
$local_votacao = $_POST["local"];

//Fazendo inserção dos dados

$sql = "INSERT INTO dados (Indicacao, Nome, Apelido, Whatsapp, Email, Data_de_Nascimento, Endereco_Local_Votacao) VALUES ('$indicacao', '$nome', '$apelido', '$whatsapp', '$email', '$data', '$local_votacao')";

if(mysqli_query($conn, $sql)){
    echo "Cadastrado";
    header('refresh:0;url=index.html');
}else{
    header('refresh:0;url=index.html');
}

?>
