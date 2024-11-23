<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pizzaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/login-cliente.css">

</head>
<body>
    <main id="container">
        <form action="testLogin.php" method="post" id="login_form">
            <div id="form_header">
                <h1>Login</h1>
                <i id="mode-icon" class="fa-solid fa-pizza-slice"></i>
            </div>

            <div id="inputs">
                <div class="input-box">
                    <label>
                        Usuário 
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="user" name="user">
                        </div>
                    </label>
                </div>

                <div class="input-box">
                    <label>
                        Senha 
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="password" name="password">
                        </div>
                    </label>
                    <div id="forgot_password">
                        <a href="esqueceu-senha.php">Esqueceu a senha?</a>
                    </div>
                </div>

            </div>

            
            <!--<button type="submit" id="login-button" name="submit">
                Login
            </button>-->
            <input type="submit" name="submit" value="Login" id="login-button">
            <div id="cadastro">
                <a href="cadastro-cliente.php">Faça seu cadastro agora.</a>
            </div>
            

        </form>
    </main>
</body>
</html>