<?php
if (isset($_POST['submit_email'])) {
    include_once('conexao.php');
    $email = $_POST['email'];

    // Verifica se o e-mail existe no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conexao->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['email_redefinicao'] = $email;
        header("Location: atualizar-senha.php");
        exit();
    } else {
        echo "<script>alert('E-mail não encontrado.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu a Senha</title>
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

        input[type="email"] {
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
        <h2>Esqueceu a Senha?</h2>
        <form action="esqueceu-senha.php" method="post">
            <input type="email" name="email" placeholder="Digite seu e-mail" required>
            <input type="submit" name="submit_email" value="Continuar">
        </form>
        <div class="back-link">
            <a href="login-cliente.php"><i class="fa fa-arrow-left"></i> Voltar ao Login</a>
        </div>
    </div>
</body>
</html>
