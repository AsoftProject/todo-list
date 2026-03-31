<?php

$maquina = 'localhost';
$banco = '';
$usuario = '';
$senha = '';

    try {
        $pdo = new PDO("mysql:host=$maquina;dbname=$banco;charset=utf8", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
        die("Erro na conexão do banco de dados" . $e->getMessage());
}


?>

