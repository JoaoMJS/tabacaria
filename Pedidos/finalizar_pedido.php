<?php
session_start();
require '../config.php';

if(!isset($_SESSION['usuario'])){
    header("Location: ../Usuarios/login.php");
    exit;
}

$carrinho = $_SESSION['carrinho'] ?? [];

if(empty($carrinho)){
    header("Location: carrinho.php");
    exit;
}

$usuario_id = $_SESSION['usuario']; // ou ['id']
$endereco = $_POST['endereco'] ?? 'Não informado';

$total = 0;

foreach($carrinho as $item){
    $total += $item['preco'] * $item['quantidade'];
}

// 🔹 salva pedido
$sql = $pdo->prepare("INSERT INTO pedidos (usuario_id, total, endereco) VALUES (?, ?, ?)");
$sql->execute([$usuario_id, $total, $endereco]);

$pedido_id = $pdo->lastInsertId();

// 🔹 salva itens
foreach($carrinho as $item){
    $sql = $pdo->prepare("
        INSERT INTO itens_pedido
        (pedido_id, produto_id, nome, preco, quantidade)
        VALUES (?, ?, ?, ?, ?)
    ");

    $sql->execute([
        $pedido_id,
        $item['produto_id'],
        $item['nome'],
        $item['preco'],
        $item['quantidade']
    ]);
}

// 🔹 limpa carrinho
unset($_SESSION['carrinho']);

// 🔹 redireciona
header("Location: ../site/index.php");
exit;