<?php
require '../config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];

$descricao = $_POST['descricao'];
$conteudo = $_POST['conteudo'];
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];

$sql = $pdo->prepare("
  UPDATE produtos 
  SET 
    nome = ?, 
    preco = ?, 
    imagem = ?, 
    descricao = ?, 
    conteudo = ?, 
    marca = ?, 
    categoria = ?
  WHERE id = ?
");

$sql->execute([
  $nome, 
  $preco, 
  $imagem,
  $descricao,
  $conteudo,
  $marca,
  $categoria,
  $id
]);

header("Location: listar_produtos.php");
exit;