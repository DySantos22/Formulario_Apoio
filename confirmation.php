<?php
session_start();

//Faz a conexão com o BD.
include 'conexao.php';

//Dados do formulário
$chave = $_GET['chave'];

//Sql que altera um registro da tabela dados

$sql2 = "UPDATE dados SET Estado='Ativo' WHERE Estado='Inativo' AND Chave='$chave'";


//Executa o sql e faz tratamento de erro.
if ($conn->query($sql2) === TRUE) {
  include 'confirmemail.html';
  header('refresh:5;url=index.html');
} else {
  echo "Erro: " . $conn->error;
  header('refresh:2;url=index.html');
}

//Fecha a conexão.
	$conn->close();
	
?> 