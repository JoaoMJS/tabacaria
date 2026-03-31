<?php
require '../config.php';

$sql = $pdo->query("SELECT * FROM pedidos ORDER BY id DESC");

while ($pedido = $sql->fetch()) {

  echo "<h3>Pedido #{$pedido['id']}</h3>";
  echo "Total: R$ {$pedido['total']}<br>";

  $itens = $pdo->prepare("
    SELECT p.nome, i.quantidade
    FROM itens_pedido i
    JOIN produtos p ON p.id = i.produto_id
    WHERE i.pedido_id = ?
  ");
  $itens->execute([$pedido['id']]);

  foreach ($itens as $item) {
    echo "- {$item['nome']} ({$item['quantidade']})<br>";
  }

  echo "<hr>";
}