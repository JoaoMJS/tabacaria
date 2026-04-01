<?php
session_start();

$pedido_id = $_GET['pedido'] ?? null;

if(!$pedido_id){
    header("Location: ../site/index.php");
    exit;
}
?>

<h2>Pedido realizado com sucesso!</h2>

<p>Seu pedido #<?= $pedido_id ?> foi enviado.</p>

<a href="../site/index.php">Voltar para a loja</a>