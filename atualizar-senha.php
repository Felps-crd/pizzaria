<?php
session_start();
if (!isset($_SESSION['email_redefinicao'])) {
    header("Location: esqueceu-senha.php");
    exit();
}

if (isset($_POST['submit_password'])) {
    include_once('conexao.php');
    $email = $_SESSION['email_redefinicao'];
    $nova_senha = $_POST['password'];

    // Atualiza a senha no banco de dados
    $sql = "UPDATE usuario SET senha = '$nova_senha' WHERE email = '$email'";
    if ($conexao->query($sql)) {
        unset($_SESSION['email_redefinicao']);
        echo "<script>alert('Senha atualizada com sucesso!');</script>";
        header("Location: login-cliente.php");
        exit();
    } else {
        echo "<script>alert('Erro ao atualizar a senha.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Senha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            width: 350px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px;
            color: white;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-link {
            margin-top: 10px;
        }

        .back-link a {
            color: #4caf50;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Atualizar Senha</h2>
        <form action="atualizar-senha.php" method="post">
            <input type="password" name="password" placeholder="Digite a nova senha" required>
            <input type="submit" name="submit_password" value="Atualizar Senha">
        </form>
        <div class="back-link">
            <a href="login-cliente.php"><i class="fa fa-arrow-left"></i> Voltar ao Login</a>
        </div>
    </div>
</body>
</html>
