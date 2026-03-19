<?php
require '../config.php';

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');

$sql = $pdo->prepare("INSERT INTO usuario(nome, email) VALUES (:nome, :email)");
$sql->bindValue(':nome',  $nome);
$sql->bindValue(':email', $email);
$sql->execute();

header("Location: listar_usuarios.php");
exit;
