<?php
require '../config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = $pdo->prepare("UPDATE usuario SET nome = ?, email = ? WHERE id = ?");
$sql->execute([$nome, $email, $id]);

header("Location: listar_usuarios.php");
exit;