<?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    $nome = $_POST['name'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];

    // Verificar se algum campo está vazio
    if (empty($nome) || empty($user) || empty($email) || empty($number) || empty($pass) || empty($gender)) {
        $cadastro_sucesso = false;
        $mensagem_erro = 'Por favor, preencha todos os campos.';
    } else {
        // Verificar se o usuário já existe
        $check_user = mysqli_query($conexao, "SELECT * FROM usuario WHERE usuario = '$user'");
        if (mysqli_num_rows($check_user) > 0) {
            $cadastro_sucesso = false;
            $mensagem_erro = 'Este usuário ja existe, digite outro.';
        } else {
            // Inserir dados no banco
            $result = mysqli_query($conexao, "INSERT INTO usuario(nome, usuario, email, celular, senha, sexo) 
            VALUES ('$nome', '$user', '$email', '$number', '$pass', '$gender');");

            // Verificar se a inserção foi bem-sucedida
            if ($result) {
                $cadastro_sucesso = true; // Variável para mostrar a mensagem de sucesso
            } else {
                $cadastro_sucesso = false;
                $mensagem_erro = 'Erro ao cadastrar. Tente novamente.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Pizzaria</title>
  <link rel="stylesheet" href="./styles/cadastro-cliente.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="container">
    <div class="form-image">
      <img src="./assets/cadastro.png">
    </div>

    <div class="form">
      <form action="cadastro-cliente.php" method="post">
        <div class="form-header">
          <div class="title"><h1 class="title">CADASTRE-SE</h1></div>
          <div class="login-button">
            <button class="hover:scale-110"><a href="login-cliente.php">Entrar</a></button>
          </div>
        </div>

        <div class="input-group">

          <div class="input-box">
            <label >Fazer nome </label>
            <input id="name" name="name" placeholder="Digite seu Nome" required type="text">
          </div>

          <div class="input-box">
            <label >Usuário</label>
            <input id="user" name="user" placeholder="Crie um Usuário" required type="text">
          </div>

          <div class="input-box">
            <label >Email</label>
            <input id="email" name="email" placeholder="Digite seu Email" required type="email">
          </div>

          <div class="input-box">
            <label >Celular</label>
            <input id="number" name="number" placeholder="(XX) X XXXX-XXXX" required type="tel">
          </div>

          <div class="input-box">
            <label >Senha</label>
            <input id="password" name="password" placeholder="Digite sua senha" required type="password">
          </div>

        </div>

        <div class="gender-inputs">
          <div class="gender-title">
            <h6>Gênero</h6>
          </div>

          <div class="gender-group">
            <div class="gender-input">
              <input type="radio" id="female" name="gender" value="Feminino">
              <label for="female">Feminino</label>
            </div>
            
            <div class="gender-input">
              <input type="radio" id="male" name="gender" value="Masculino">
              <label for="male">Masculino</label>
            </div>

            <div class="gender-input">
              <input type="radio" id="others" name="gender" value="Outros">
              <label for="others">Outros</label>
            </div>
          </div>
        </div>

        <div class="">
          <input class="continue-button" type="submit" value="Cadastrar" name="submit" id="continua-cadastro">
        </div>

      </form>
    </div>
  </div>

  <?php
    if (isset($cadastro_sucesso)) {
      if ($cadastro_sucesso) {
        echo "
          <script>
            Swal.fire({
              title: 'Cadastro realizado com sucesso!',
              text: 'Você será redirecionado para o login.',
              icon: 'success',
              confirmButtonText: 'OK',
              customClass: {
                popup: 'swal-popup'
              }
            }).then(function() {
              window.location.href = 'login-cliente.php';
            });
          </script>
        ";
      } else {
        echo "
          <script>
            Swal.fire({
              title: 'Erro!',
              text: '$mensagem_erro',
              icon: 'error',
              confirmButtonText: 'Tentar novamente',
              customClass: {
                popup: 'swal-popup'
              }
            });
          </script>
        ";
      }
    }
  ?>

  <style>
    .swal-popup {
      width: 100% !important;
      max-width: 400px;
      margin: 0 auto;
      text-align: center;
      padding: 20px;
    }
    .swal-popup .swal2-title {
      font-size: 24px;
      color: #4caf50;
      margin-bottom: 15px;
    }
    .swal-popup .swal2-content {
      font-size: 16px;
      color: #333;
    }
    .swal-popup .swal2-confirm {
      background-color: #4caf50;
      color: white;
    }
  </style>

</body>
</html>
