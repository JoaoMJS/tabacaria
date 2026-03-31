<?php
session_start();
require '../config.php';

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['carrinho'])) {
  header("Location: carrinho.php");
  exit;
}

$usuario_id = $_SESSION['usuario_id'];
$carrinho = $_SESSION['carrinho'];

$total = 0;
foreach ($carrinho as $item) {
  $total += $item['preco'] * $item['quantidade'];
}

// cria pedido
$sql = $pdo->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");
$sql->execute([$usuario_id, $total]);

$pedido_id = $pdo->lastInsertId();

// salva itens
foreach ($carrinho as $item) {
  $sql = $pdo->prepare("
    INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco)
    VALUES (?, ?, ?, ?)
  ");
  $sql->execute([
    $pedido_id,
    $item['produto_id'],
    $item['quantidade'],
    $item['preco']
  ]);
}

// limpa carrinho
unset($_SESSION['carrinho']);

// redireciona
header("Location: confirmacao.php?id=" . $pedido_id);