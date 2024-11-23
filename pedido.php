<?php
session_start();
header('Content-Type: application/json');

// Conecta ao banco de dados
include_once('conexao.php');

// Verifica se o corpo da requisição contém dados JSON
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cartItems']) || !isset($data['address']) || !isset($data['deliveryMethod']) || !isset($data['paymentMethod']) || !isset($data['total'])) {
    echo json_encode(['success' => false, 'message' => "Dados incompletos"]);
    exit();
}

// Dados do pedido
$cartItems = $data['cartItems'];
$address = $data['address'];
$deliveryMethod = $data['deliveryMethod']; // Método de entrega
$paymentMethod = $data['paymentMethod']; // Método de pagamento
$total = $data['total']; // Total do pedido
$user = $_SESSION['user']; // Usuário logado

// Inicia uma transação para inserir os dados
$conexao->begin_transaction();

try {
    // Inserção do pedido principal com os novos campos
    $stmt = $conexao->prepare("INSERT INTO pedidos (usuario, descricao, data, endereco, metodo_entrega, metodo_pagamento, total) VALUES (?, ?, NOW(), ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $user, $cartItems, $address, $deliveryMethod, $paymentMethod, $total);

    if ($stmt->execute()) {
        // Confirma a transação se a execução for bem-sucedida
        $conexao->commit();
        echo json_encode(['success' => true, 'message' => 'Pedido realizado com sucesso!']);
    } else {
        // Caso o execute falhe, joga um erro
        throw new Exception('Falha ao inserir o pedido');
    }
} catch (Exception $e) {
    // Se algo der errado, desfaz a transação
    $conexao->rollback();
    echo json_encode(['success' => false, 'message' => "Erro ao processar o pedido: " . $e->getMessage()]);
}

$stmt->close();
$conexao->close();
?>
