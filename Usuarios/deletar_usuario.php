<?php
session_start();
require '../config.php';

if(!isset($_SESSION['usuario'])){
  echo "Você precisa estar logado";
  exit;
}

$id = $_GET['id'];

if($id == $_SESSION['usuario']){
  echo "Você não pode excluir sua própria conta";
  exit;
}

$sql = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
$sql->execute([$id]);

header("Location: listar_usuarios.php");
exit;