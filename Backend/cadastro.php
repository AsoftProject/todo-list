<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nasc'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $db->prepare("INSERT INTO usuarios (nome, telefone, genero, data_nasc, senha) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$nome, $telefone, $genero, $data_nasc, $senha])) {
            echo "<script>
                alert('Conta criada com sucesso! \\n\\nSeja bem-vindo(a), $nome!');
                window.location.href = 'dashboard.php';
            </script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<script>alert('Erro: Este número de telefone já está registrado.');</script>";
    }
}