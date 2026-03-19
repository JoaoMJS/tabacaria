<?php
require '../config.php';
//Importante o '../config.php' ao invés do "'config.php';" porque a primeira opção volta uma pasta atrás, e não procura na mesma pasta do produto, 
//e nesse caso vai procurar na pasta anterior, da TABACARIA
// O chatgpt recomenda usar "require __DIR__ . '/../config.php';" para evitar problemas desse tipo

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];

$sql = $pdo->prepare("INSERT INTO produtos (nome, preco, imagem) VALUES (?, ?, ?)");
$sql->execute([$nome, $preco, $imagem]);

header("Location: listar_produtos.php");
exit;