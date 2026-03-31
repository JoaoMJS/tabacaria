<?php
session_start();

$id = $_POST['produto_id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];




if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// verifica se já existe
$existe = false;

foreach ($_SESSION['carrinho'] as &$item) {
    if ($item['produto_id'] == $id) {
        $item['quantidade']++;
        $existe = true;
        break;
    }
}

if (!$existe) {
    $_SESSION['carrinho'][] = [
        'produto_id' => $id,
        'nome' => $nome,
        'preco' => $preco,
        'quantidade' => 1,
        'imagem' => $imagem

    ];
}

header("Location: ../Pedidos/carrinho.php");