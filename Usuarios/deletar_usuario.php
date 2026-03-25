<?php
session_start();
require '../config.php';

if($_SESSION['tipo'] !== 'admin'){
  echo "Acesso negado";
  exit;
}

$id = $_GET['id'];

$sql = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
$sql->execute([$id]);

header("Location: listar_usuarios.php");
exit;