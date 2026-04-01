<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        
        if ($stmt->execute([$nome, $email, $senha])) {
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
