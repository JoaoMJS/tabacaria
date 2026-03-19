<?php
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
$sql->execute([$id]);

header("Location: listar_produtos.php");
exit;