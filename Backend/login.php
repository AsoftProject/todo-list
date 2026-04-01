<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome']; 
        
        $nomeUsuario = $user['nome'];


        echo "<script>
            alert('Olá, $nomeUsuario! \\n\\nSeja bem-vindo ao nosso sistema de Tarefas.');
            window.location.href = 'dashboard.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Erro: Telefone ou Senha incorretos!');</script>";
    }
}
?>
