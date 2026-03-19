<?php
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("DELETE FROM usuario WHERE id = ?");
$sql->execute([$id]);

header("Location: listar_usuarios.php");
exit;