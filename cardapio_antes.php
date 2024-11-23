<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['senha']) ==true))
    {
        unset($_SESSION['user']);
        unset( $_SESSION['senha']);
        header('Location: login-cliente.php');
    }
    $logado = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria do Vale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./styles/modal.css">
    <style>
        .bg-home {
    background-image: url('/assets/bg.png');
    
    }
    .bg-blue-500 {
    --tw-bg-opacity: 1;
    background-color: rgb(59 130 246 / var(--tw-bg-opacity)) /* #3b82f6 */;
}
.hover\:bg-blue-700:hover {
    --tw-bg-opacity: 1;
    background-color: rgb(29 78 216 / var(--tw-bg-opacity)) /* #1d4ed8 */;
}
.px-4 {
    padding-left: 1rem /* 16px */;
    padding-right: 1rem /* 16px */;
}
.py-2 {
    padding-top: 0.5rem /* 8px */;
    padding-bottom: 0.5rem /* 8px */;
}
.sair:hover{
    background-color: #e8e8e8;
    color: black;
    
}
.sair{
    margin-top: 1rem
    
}
.mt-4 {
    margin-top: 1rem /* 16px */;
}
    </style>
    
</head>
<body>
    
    <!--HEADER-->
    <header class="w-full h-[420px] bg-zinc-900 bg-home bg-cover bg-center">
        <div class="w-full h-full flex flex-col justify-center items-center">
            <img 
                src="./assets/hamb-1.png"
                alt="Logo Pizzaria" 
                class="w-32 h-32 rounded-full shadow-lg hover:scale-110 duration-200"
            />
            <h1 class="text-3xl mt-4 mb-2 font-bold text-white">Pizzaria do Vale</h1>

            <span class="text-white font-medium">Rua arco iris, 24, jardim do vale</span>

            <div class="bg-green-600 px-4 py-1 rounded-lg mt-5" id="date-span">
                <span class="text-white font-medium">Seg a Dom - 18:00 as 23:00</span>
            </div>


        <div>
            <!--<button class="sair bg-red-500 mt-4 text-white font-bold py-1 px-4 rounded">-->
            <a href="sair.php" class="sair bg-red-500 mt-5 text-white font-bold px-4 rounded">Finalizar sessão</a>
            <a href="index.php" class="sair bg-green-600 mt-5 text-white font-bold px-4 rounded">Cardapio</a>
            <a href="pedidos-cliente.php" class="sair bg-green-600 mt-5 text-white font-bold px-4 rounded">Meus pedidos</a>
            <!--</button>-->
        </div>
            

        </div>
    </header>
    <!--FIM DO HEADER-->


    <h2 class="text-2xl md:text-3xl font-bold text-center mt-9 mb-6">
        Bem-vindo ao nosso menu<?php echo", $logado" ?>
    </h2>

    <!--Inicio Menu-->
    <div id="menu">

        <main class="grid grid-cols-1 md:grid-cols-2 gap-7 md:gap-10 mx-auto max-w-7xl px-2 mb-16">

            <!--PRODUTO ITEM-->
            <div class="flex gap-2 ">

                <img 
                src="./assets/hamb-1.png" 
                alt="Hamburguer smash"
                class="w-28 h-28 rounded-md hover:scale-110 hover:-rotate-2 duration-300"
                />

                <div>
                    <p class="font-bold">Hamburguer Smash</p>
                    <p class="text-sm">Pão levinho de fermentaçao natura da suécia, burguer 180g, queijo prato e 
                    maionese da casa</p>

                    <div class="flex items-center gap-2 justify-between mt-3">
                        <p class="font-bold text-lg">R$ 18.90</p>
                        <button 
                        class="bg-gray-900 px-5 rounded add-to-cart-btn"
                        data-name="Hamburguer Smash"
                        data-price="18.90"
                        >
                            <i class="fa fa-cart-plus text-lg text-white "></i>
                        </button>
                    </div>

                </div>

            </div>
            <!--FIM PRODUTO ITEM-->

            <!--PRODUTO ITEM-->
            <div class="flex gap-2 ">

                <img 
                src="./assets/hamb-2.png" 
                alt="Hamburguer Duplo"
                class="w-28 h-28 rounded-md hover:scale-110 hover:-rotate-2 duration-300"
                />

                <div>
                    <p class="font-bold">Hamburguer Duplo</p>
                    <p class="text-sm">Pão levinho de fermentaçao natura da suécia, burguer 180g, queijo prato e 
                    maionese da casa</p>

                    <div class="flex items-center gap-2 justify-between mt-3">
                        <p class="font-bold text-lg">R$ 32.90</p>
                        <button 
                        class="bg-gray-900 px-5 rounded add-to-cart-btn"
                        data-name="Hamburguer Duplo"
                        data-price="32.90"
                        >
                            <i class="fa fa-cart-plus text-lg text-white "></i>
                        </button>
                    </div>

                </div>

            </div>
            <!--FIM PRODUTO ITEM-->

            <!--PRODUTO ITEM-->
            <div class="flex gap-2 ">

                <img 
                src="./assets/hamb-3.png" 
                alt="Hamburguer Salad"
                class="w-28 h-28 rounded-md hover:scale-110 hover:-rotate-2 duration-300"
                />

                <div>
                    <p class="font-bold">Hamburguer Salad</p>
                    <p class="text-sm">Pão levinho de fermentaçao natura da suécia, burguer 180g, queijo prato e 
                    maionese da casa</p>

                    <div class="flex items-center gap-2 justify-between mt-3">
                        <p class="font-bold text-lg">R$ 35.90</p>
                        <button 
                        class="bg-gray-900 px-5 rounded add-to-cart-btn"
                        data-name="Hamburguer Salad"
                        data-price="35.90"
                        >
                            <i class="fa fa-cart-plus text-lg text-white "></i>
                        </button>
                    </div>

                </div>

            </div>
            <!--FIM PRODUTO ITEM-->

            <!--PRODUTO ITEM-->
            <div class="flex gap-2 ">

                <img 
                src="./assets/hamb-4.png" 
                alt="Hamburguer da Casa"
                class="w-28 h-28 rounded-md hover:scale-110 hover:-rotate-2 duration-300"
                />

                <div>
                    <p class="font-bold">Hamburguer da Casa</p>
                    <p class="text-sm">Pão levinho de fermentaçao natura da suécia, burguer 180g, queijo prato e 
                    maionese da casa</p>

                    <div class="flex items-center gap-2 justify-between mt-3">
                        <p class="font-bold text-lg">R$ 30.00</p>
                        <button 
                        class="bg-gray-900 px-5 rounded add-to-cart-btn"
                        data-name="Hamburguer da Casa"
                        data-price="30.00"
                        >
                            <i class="fa fa-cart-plus text-lg text-white "></i>
                        </button>
                    </div>

                </div>

            </div>
            <!--FIM PRODUTO ITEM-->

        </main>

        <div class="mx-auto max-w-7xl px-2 my-2">
            <h2 class="font-bold text-3xl">
            Bebidas
            </h2>
        </div>

        <!--GRID BEBIDAS-->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-7 md:gap-10 mx-auto max-w-7xl px-2 mb-16">

            <!--BEBIDA ITEM-->
            <div class="flex gap-2 w-full">

                <img 
                src="./assets/refri-1.png" 
                alt="Coca Lata"
                class="w-28 h-28 rounded-md hover:scale-110 hover:-rotate-2 duration-300"
                />

                <div class="w-full">
                    <p class="font-bold">Coca Lata</p>

                    <div class="flex items-center gap-2 justify-between mt-3">
                        <p class="font-bold text-lg">R$ 6.00</p>
                        <button 
                        class="bg-gray-900 px-5 rounded add-to-cart-btn"
                        data-name="Coca Lata"
                        data-price="6.00"
                        >
                            <i class="fa fa-cart-plus text-lg text-white "></i>
                        </button>
                    </div>

                </div>

            </div>
            <!--FIM BEBIDA ITEM-->

            <!--BEBIDA ITEM-->
            <div class="flex gap-2 w-full">

                <img 
                src="./assets/refri-2.png" 
                alt="Guarana Lata"
                class="w-28 h-28 rounded-md hover:scale-110 hover:-rotate-2 duration-300"
                />

                <div class="w-full">
                    <p class="font-bold">Guaraná Lata</p>

                    <div class="flex items-center gap-2 justify-between mt-3">
                        <p class="font-bold text-lg">R$ 6.00</p>
                        <button 
                        class="bg-gray-900 px-5 rounded add-to-cart-btn"
                        data-name="Guarana Lata"
                        data-price="6.00"
                        >
                            <i class="fa fa-cart-plus text-lg text-white "></i>
                        </button>
                    </div>

                </div>

            </div>
            <!--FIM BEBIDA ITEM-->

        </div>

        <!--FIM GRID BEBIDAS-->

    </div>
    <!--Fim Menu-->

    <!--MODAL CART-->

    <div class="bg-black/60 w-full h-full fixed top-0 left-0 z-(99) items-center justify-center hidden" id="cart-modal">

        <div class="bg-white p-5 rounded-md min-w-[90%] md:min-w-[600px] modal-content">
            <h2 class="text-center font-bold text-2xl mb-2">Meu Carrinho</h2>

            <div id="cart-items" class="flex justify-between mb-2 flex-col"></div>

            <p class="font-bold">Total: <span id="cart-total">0.00</span></p>

            <p class="font-bold mt-4">Endereço Entrega:</p>
            <input 
            type="text"
            placeholder="Digite aqui seu endereço completo..."
            id="address"
            class="w-full border-2 p-1 rounded my-1"
            />

            <p class="text-red-500 hidden" id="address-warn">Digite seu endereço completo!</p>

            <!--<div class="flex items-center justify-between mt-5 w-full">
                <button id="close-modal-btn">Fechar</button>
                <button id="checkout-btn" class="bg-green-500 text-white px-4 py-1 rounded">Finalizar Pedido</button>

            </div>
            -->
            <!-- Seleção de método de entrega -->
        <p class="font-bold mt-4">Método de entrega:</p>
        <select id="delivery-method" class="w-full border-2 p-1 rounded my-1">
            <option value="entrega">Entrega</option>
            <option value="retira">Retira no local</option>
        </select>

        <!-- Seleção de método de pagamento -->
        
        <select id="payment-method" class="w-full border-2 p-1 rounded my-1">
            <option value="cartao">Cartão</option>
            <option value="dinheiro">Dinheiro</option>
            <option value="pix">Pix</option>
        </select>

        <p class="text-red-500 hidden" id="payment-method-warn">Selecione um método de pagamento!</p>

            <form method="post" id="form-finalizar-pedido" action="pedido.php" class="flex items-center justify-between mt-5 w-full">
            <input type="hidden" name="total" id="total-input" value="0">
            <button id="close-modal-btn">Fechar</button>
            <button type="submit" id="checkout-btn" class="bg-green-500 text-white px-4 py-1 rounded">Finalizar Pedido</button>
            </form>


        </div>

    </div>

    <!--FIM MODAL CART-->

    <!--BUTTON CART FOOTER-->

    <footer class="w-full bg-red-500 py-3 fixed bottom-0 z-40 flex item-center justify-center" id="cart-btn">
        <button class="flex items-center gap-w text-white font-bold"
        id="cart-btn"
        >
            (<span id="cart-count">0</span>)
            Veja Meu Carrinho
            <i class="fa fa-cart-plus text-lg text-white"></i>
        </button>
    </footer>

    <!--FIM BUTTON CART FOOTER-->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="ff.js"></script>
    
</body>
</html>

