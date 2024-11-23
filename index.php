<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pizzaria</title>
    <link rel="stylesheet" href="./styles/login-cliente.css">
    <style>
    .home-button{
        
        text-decoration: none;
        background: #ffc2c2;
        padding: 7px;
        font-size: 20px;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 5px, 5px, 8px rgba(0, 0, 0, 0.336);
        width: auto;
        font-weight: bolder;
        font-size: 1.2rem;
        font-weight: 500;
        color: black;
        padding-left: 2.4rem;
        padding-right: 2.4rem;
        
        
    }
    .cad{
        padding-left: 1rem;
        padding-right: 1rem;
        
        

    }

    .home-button:hover{
        background-color: rgb(218, 227, 235);
    }


    </style>
</head>
<body>

    <main id="container">
        <form action="" method="post" class="home">            
            <!--<button class="home-button" form="enter">-->
                <a href="login-cliente.php" class="home-button" name="enter">Entrar</a>
            <!--</button>-->
            
            <!--<button type="submit" class="home-button" form="cad">-->
                <a href="cadastro-cliente.php" class="home-button cad" name="cad">Cadastrar</a>

            <!--</button>-->
            

        </form>
    </main>
    
</body>
</html>