<?php
require '../config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// se senha foi preenchida
if(!empty($senha)){
  $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

  $sql = $pdo->prepare("
    UPDATE usuarios 
    SET nome = ?, email = ?, senha = ?
    WHERE id = ?
  ");

  $sql->execute([$nome, $email, $senhaHash, $id]);

} else {

  $sql = $pdo->prepare("
    UPDATE usuarios 
    SET nome = ?, email = ?
    WHERE id = ?
  ");

  $sql->execute([$nome, $email, $id]);
}

header("Location: listar_usuarios.php");
exit;