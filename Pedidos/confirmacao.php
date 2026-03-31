<?php
session_start();
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM pedidos WHERE id = ?");
$sql->execute([$id]);
$pedido = $sql->fetch();
?>

<h2>Pedido realizado com sucesso! 🎉</h2>
<p>Número do pedido: <?= $pedido['id'] ?></p>
<p>Total: R$ <?= number_format($pedido['total'], 2, ',', '.') ?></p>

<a href="../site/index.php">Voltar ao site</a>