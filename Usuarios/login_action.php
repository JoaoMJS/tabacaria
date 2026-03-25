<?php
session_start();
require '../config.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$sql->execute([$email]);

$user = $sql->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($senha, $user['senha'])){

  $_SESSION['usuario'] = $user['id'];
  $_SESSION['nome'] = $user['nome'];
  $_SESSION['tipo'] = $user['tipo'];

  header("Location: ../Site/index.php");
  exit;

}else{
  echo "Email ou senha inválidos";
}