<?php
    session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password']))
    {
        //Acessa
        include_once('conexao.php');
        $usuario = $_POST['user'];
        $senha = $_POST['password'];

        /*print_r($user);
        print_r('<br>');
        print_r($pass);*/

        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($result);

        if(mysqli_num_rows($result) <1){
            unset($_SESSION['user']);
            unset( $_SESSION['senha']);
            header('Location: login-cliente.php');
        }
        else{
            $_SESSION['user'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: cardapio_atualizado.php');
        }
    }
    else
    {
        header('Location: login-cliente.php');
    }
    $_SESSION['logade'] = $usuario;


?>