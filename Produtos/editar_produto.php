<?php
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$sql->execute([$id]);

$produto = $sql->fetch(PDO::FETCH_ASSOC);
?>

<h1>Editar Produto</h1>

<form method="POST" action="editar_produto_action.php">

  <input type="hidden" name="id" value="<?= $produto['id']; ?>">

  <label>
    Nome:<br>
    <input type="text" name="nome" value="<?= $produto['nome']; ?>">
  </label>
  <br><br>

  <label>
    Preço:<br>
    <input type="text" name="preco" value="<?= $produto['preco']; ?>">
  </label>
  <br><br>

  <label>
    Imagem:<br>
    <input type="text" name="imagem" value="<?= $produto['imagem']; ?>">
  </label>
  <br><br>

  <!-- campos de edição - descrição, conteudo, marca, categoria e imagem -->

  <label>
    Descrição:<br>
    <textarea name="descricao"><?= $produto['descricao'] ?? ''; ?></textarea>
  </label>
  <br><br>

  <label>
    Conteúdo:<br>
    <input type="text" name="conteudo" value="<?= $produto['conteudo'] ?? ''; ?>">
  </label>
  <br><br>

  <label>
    Marca:<br>
    <input type="text" name="marca" value="<?= $produto['marca'] ?? ''; ?>">
  </label>
  <br><br>

  <label>
    Categoria:<br>
    <input type="text" name="categoria" value="<?= $produto['categoria'] ?? ''; ?>">
  </label>
  <br><br>

  <label>
    Imagem:<br>
    <input type="text" name="imagem" value="<?= $produto['imagem'] ?? ''; ?>">
  </label>
  <br><br>

  <input type="submit" value="Salvar">

</form>