<?php
    include('header.html');
    include_once('conexao.php'); // Inclui o arquivo de conexão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio Maxfervipe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./styles/modal.css">
    <style>
        /* Estilo para o layout do cardápio */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 280px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }
        .card h3 {
            margin: 0;
            color: #333;
            font-size: 1.25em;
        }
        .card p {
            margin: 10px 0;
            color: #666;
            font-size: 0.95em;
        }
        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }
        .card-footer p {
            margin: 0;
            font-weight: bold;
            font-size: 1.1em;
            color: #4CAF50;
        }
        .card button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s;
        }
        .card button:hover {
            background-color: #45a049;
        }
        body {
    padding-bottom: 60px; /* Ajuste conforme necessário para o tamanho do footer */
}

    </style>
</head>
<body>

<h2 class="text-2xl md:text-3xl font-bold text-center mt-9 mb-6">
    Bem-vindo ao nosso menu<?php echo ", $logado" ?>
</h2>
<div class="container">
    <?php
    if (isset($conexao)) {
        $result = mysqli_query($conexao, "SELECT id_produto, nome, descricao, preco, imagem FROM produtos"); // Agora inclui a coluna 'imagem'
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Obtendo o nome da imagem armazenada no banco de dados
                $imagemProduto = $row["imagem"];
                $caminhoImagem = "uploads/" . $imagemProduto; // Caminho para a imagem na pasta 'uploads'

                echo "<div class='card'>";
                echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["descricao"]) . "</p>";

                // Exibe a imagem do produto
                echo "<img src='$caminhoImagem' alt='" . htmlspecialchars($row["nome"]) . "' class='img-fluid mb-3' style='max-width: 250px; max-height: 250px; width: 100%; height: 100%;'>";

                echo "<div class='card-footer'>";
                echo "<p>R$" . number_format($row["preco"], 2, ',', '.') . "</p>";
                echo "<button onclick='adicionarAoCarrinho(" . $row["id_produto"] . ")' 
                      class='add-to-cart-btn'
                      data-name='" . htmlspecialchars($row["nome"]) . "'
                      data-price='" . htmlspecialchars(number_format($row["preco"], 2, '.', '')) . "'>Adicionar</button>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "Nenhum produto encontrado no cardápio.";
        }
        $conexao->close();
    } else {
        echo "Erro ao conectar ao banco de dados.";
    }
    ?>
</div>

<!-- MODAL CART -->
<div class="bg-black/60 w-full h-full fixed top-0 left-0 z-99 items-center justify-center hidden" id="cart-modal">
    <div class="bg-white p-5 rounded-md min-w-[90%] md:min-w-[600px] modal-content">
        <h2 class="text-center font-bold text-2xl mb-2">Meu Carrinho</h2>
        <div id="cart-items" class="flex justify-between mb-2 flex-col"></div>
        <p class="font-bold">Total: <span id="cart-total">0.00</span></p>
        <p class="font-bold mt-4">Endereço Entrega:</p>
        <input type="text" placeholder="Digite aqui seu endereço completo..." id="address" class="w-full border-2 p-1 rounded my-1" />
        <p class="text-red-500 hidden" id="address-warn">Digite seu endereço completo!</p>
        <p class="font-bold mt-4">Método de entrega:</p>
        <select id="delivery-method" class="w-full border-2 p-1 rounded my-1">
            <option value="entrega">Entrega</option>
            <option value="retira">Retira no local</option>
        </select>
        <select id="payment-method" class="w-full border-2 p-1 rounded my-1">
            <option value="cartao">Cartão</option>
            <option value="dinheiro">Dinheiro</option>
            <option value="pix">Pix</option>
        </select>
        <p class="text-red-500 hidden" id="payment-method-warn">Selecione um método de pagamento!</p>
        <form id="form-finalizar-pedido" class="flex items-center justify-between mt-5 w-full">
            <input type="hidden" name="total" id="total-input" value="0">
            <button id="close-modal-btn">Fechar</button>
            <button type="button" id="checkout-btn" class="bg-green-500 text-white px-4 py-1 rounded">Finalizar Pedido</button>
        </form>
        <div id="success-message" class="text-green-500 font-bold hidden">Pedido enviado com sucesso!</div>
    </div>
</div>
<!-- FIM MODAL CART -->

<footer class="w-full bg-red-500 py-3 fixed bottom-0 z-40 flex item-center justify-center" id="cart-btn">
    <button class="flex items-center gap-w text-white font-bold" id="cart-btn">
        (<span id="cart-count">0</span>) Veja Meu Carrinho <i class="fa fa-cart-plus text-lg text-white"></i>
    </button>
</footer>

<script src="dd.js"></script>
</body>
</html>
