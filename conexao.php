<?php
// Parâmetros para criar a conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_dados";

// Criando a conexão
if( $conn = mysqli_connect($servername, $username, $password, $dbname)){
    echo "Conexão realizada com sucesso!";
}else{
    echo "Erro na conexão: ".mysqli_error();
}
?>