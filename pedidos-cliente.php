<?php
include('header.html');
include_once('conexao.php'); // Conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['user'])) {
    header("Location: login-cliente.php");
    exit();
}

// Obtém o usuário logado
$logado = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./styles/modal.css">
    <style>
       

        .pedido-container {
            padding: 20px;
            max-width: 900px;
            margin: auto;
        }

        .pedido-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .pedido-card:not(:last-child) {
            margin-bottom: 15px;
        }

        .pedido-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .pedido-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .pedido-header h4 {
            color: #3a86ff;
        }

        .pedido-header p {
            color: #6c757d;
            font-size: 0.9em;
        }

        .pedido-descricao {
            margin-top: 10px;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9em;
            color: #495057;
            line-height: 1.5;
        }

        .pedido-footer {
            margin-top: 15px;
            text-align: right;
        }

        .pedido-footer p {
            margin: 5px 0;
            font-weight: bold;
        }

        .pedido-footer p strong {
            color: #2ec4b6;
        }

        @media (max-width: 768px) {
            .pedido-card {
                padding: 10px;
            }

            .pedido-header h4 {
                font-size: 1em;
            }

            .pedido-header p {
                font-size: 0.8em;
            }

            .pedido-descricao {
                font-size: 0.85em;
            }
        }
    </style>
</head>
<body>

<h2 class="text-2xl md:text-3xl font-bold text-center mt-9 mb-6">
    Aqui está seus pedidos<?php echo ", $logado" ?>
</h2>

<div class="pedido-container">
    <?php
    // Consulta os pedidos do cliente logado
    $sql = "SELECT id, descricao, data, total, situacao FROM pedidos WHERE usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $logado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='pedido-card'>";
            echo "<div class='pedido-header'>";
            echo "<h4>Pedido #" . htmlspecialchars($row['id']) . "</h4>";
            echo "<p>" . date('d/m/Y H:i', strtotime($row['data'])) . "</p>";
            echo "</div>";

            echo "<div class='pedido-descricao'>";
            echo "<p><strong>Detalhes:</strong><br>" . nl2br(htmlspecialchars($row['descricao'])) . "</p>";
            echo "</div>";

            echo "<div class='pedido-footer'>";
            echo "<p><strong>Total:</strong> R$" . number_format($row['total'], 2, ',', '.') . "</p>";
            echo "<p><strong>Status:</strong> " . htmlspecialchars($row['situacao']) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-center'>Nenhum pedido encontrado.</p>";
    }
    ?>
</div>

</body>
</html>
