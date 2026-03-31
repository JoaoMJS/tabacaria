<?php
session_start();
include '../config.php';

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM pedidos WHERE usuario_id = '$usuario_id'";
$result = mysqli_query($conn, $sql);

while ($pedido = mysqli_fetch_assoc($result)) {

    echo "<h3>Pedido #{$pedido['id']}</h3>";
    echo "Total: R$ {$pedido['total']}<br>";

    $pedido_id = $pedido['id'];

    $sql_itens = "SELECT p.nome, i.quantidade, i.preco
                  FROM itens_pedido i
                  JOIN produtos p ON i.produto_id = p.id
                  WHERE i.pedido_id = '$pedido_id'";

    $itens = mysqli_query($conn, $sql_itens);

    while ($item = mysqli_fetch_assoc($itens)) {
        echo "- {$item['nome']} ({$item['quantidade']})<br>";
    }

    echo "<hr>";
}