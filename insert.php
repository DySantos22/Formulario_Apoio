<?php
session_start();

//Conexao com o BD
include 'conexao.php';

// Pegando os dados

$indicacao = $_POST["indicacao"];
$nome = $_POST["nome"];
$apelido = $_POST["apelido"];
$whatsapp = $_POST["whatsapp"];
$email = $_POST["email"];
$data = $_POST["data"];
$local_votacao = $_POST["local"];
$estado = "Inativo";
$acesso = "Apoiador";
$_SESSION['email'] = $email;

//Senha criptografada
$senha = password_hash("!mudar123", PASSWORD_DEFAULT);


// Gerando chave para confirmação email
$chave = password_hash($email . date('Y-m-d H:i:s'),PASSWORD_DEFAULT);
$_SESSION['chave'] = $chave;


//Verificando Email no BD
$sql = "SELECT * FROM usuario WHERE Email='$email'";

//Gerando resultado 
$result = $conn->query($sql);
//Linha
$row = $result->fetch_assoc();

//Fazendo a verificacao, caso já exista o email
if($result->num_rows > 0){
   include 'boxes/erroremail.html';
   header('refresh:3;url=index.html');
}else{


//Fazendo inserção dos usuario

$sql2 = "INSERT INTO usuario (Indicacao, Nome, Senha, Apelido, Whatsapp, Email, Data_de_Nascimento, Endereco_Local_Votacao, Chave, Estado, Acesso) VALUES ('$indicacao', '$nome', '$senha', '$apelido', '$whatsapp', '$email', '$data', '$local_votacao', '$chave', '$estado', '$acesso')";

//Se a conexão e a inserção foram feitas, vai para sendemail.php
if($conn->query($sql2) === TRUE){
    header("location: sendemail.php");
}
}
//Fecha a conexão
$conn->close();
?>

