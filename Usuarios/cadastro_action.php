<?php
require '../config.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// verifica se já existe
$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
$sql->execute([$email]);

if($sql->rowCount() > 0){
  echo "Email já cadastrado";
  exit;
}

// insere
$sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
$sql->execute([$nome, $email, $senha]);

header("Location: login.php");
exit;