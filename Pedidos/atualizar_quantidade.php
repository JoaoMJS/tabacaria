<?php
session_start();

$id = $_POST['produto_id'];
$qtd = $_POST['quantidade'];

foreach ($_SESSION['carrinho'] as &$item) {
  if ($item['produto_id'] == $id) {
    $item['quantidade'] = $qtd;
  }
}

header("Location: carrinho.php");