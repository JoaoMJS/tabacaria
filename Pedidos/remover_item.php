<?php
session_start();

$id = $_GET['id'];

foreach ($_SESSION['carrinho'] as $key => $item) {
  if ($item['produto_id'] == $id) {
    unset($_SESSION['carrinho'][$key]);
  }
}

header("Location: carrinho.php");