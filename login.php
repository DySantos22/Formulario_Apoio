<?php
session_start();

if (isset($_POST['senha'])){
// Dados do Formulário
$campoemail = $_POST["email"];
$camposenha = $_POST["senha"];

//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL (consulte tudo na tabela usuarios com o email digitado no form)
$sql = "SELECT * FROM usuario WHERE Email='$campoemail' AND Acesso='Mestre'";
$sql2 = "SELECT * FROM usuario WHERE Email='$campoemail' AND Acesso='Apoiador'";

//Executa o SQL
$result = $conn->query($sql);
$result2 = $conn->query($sql2);


// Cria uma matriz com o resultado da consulta
$row = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();

if ($result->num_rows > 0 || $result2->num_rows>0){
		
    //Ele impede o acesso de apoiadores que estao inativos
    if($row2['Email'] == $campoemail AND $row2['Estado'] == 'Inativo' ){
        include('boxes/errorvalidacao_login.html');
        header('refresh:2; url=login.html');
    }else{
        //Verificacao da senha do ADM
        if(password_verify($camposenha, $row['Senha'])){
            header('location: mestre/principalmestre.php');
            $_SESSION['Acesso'] = $row['Acesso'];
            $_SESSION['Nome'] = $row['Nome'];
        }
        //Verificacao da senha do usuario
        else if(password_verify($camposenha, $row2['Senha'])){
            header('location: apoiador/principalapoiador.html');
        }else{
            //Caso os dados estejam errados
            echo "<script language=javascript>alert('Email ou senha Incorretos!');window.location='login.html';</script>";
        }
    }
}else{
    //Caso não tenha encontrado o email no BD
    echo "<script type=\"text/javascript\">alert(\"Email não existe!\");</script>";
}
}else{
    //Caso não tenha usado o formulário
    header('location: login.html');
    exit;
}
//Fecha a conexão
$conn->close();
?>