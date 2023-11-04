<?php
    try {
        $host = "localhost"; //localhost, ip ou host
        $dbname = "form_"; //nome do banco de dados
        $root = "nomedousuario"; //usuario
        $password = "senha"; //senha de conexao

        $pdo = new PDO ("mysql:host=$host;dbname=$dbname","$root","$password");

    } catch (PDOException $e) {
	    echo "Erro de Conexão " . $e->getMessage() . "\n";
	    exit;
}

?>