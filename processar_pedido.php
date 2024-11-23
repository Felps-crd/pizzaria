<?php

include_once('conexao.php');
session_start();

// Verifica se os dados foram enviados via POST
if (isset($_POST['message']) && isset($_POST['address'])) {
    $message = $_POST['message'];
    $address = $_POST['address'];

    // Aqui você pode processar os dados, como salvar em um banco de dados ou enviar um e-mail.
    // Exemplo de resposta
    echo json_encode([
        'status' => 'success',
        'message' => "Pedido recebido: $message | Endereço: $address"
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Dados não recebidos corretamente.'
    ]);
}
echo"$logade";
echo"$message";
echo"$address";

?>
