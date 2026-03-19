<?php
require '../config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];

$sql = $pdo->prepare("UPDATE produtos SET nome = ?, preco = ? WHERE id = ?");
$sql->execute([$nome, $preco, $id]);

header("Location: listar_produtos.php");
exit;