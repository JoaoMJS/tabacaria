<?php
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$sql->execute([$id]);

$usuario = $sql->fetch(PDO::FETCH_ASSOC);
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_usuario_action.php">

  <input type="hidden" name="id" value="<?= $usuario['id']; ?>">

  <label>
    Nome:<br>
    <input type="text" name="nome" value="<?= $usuario['nome']; ?>">
  </label>
  <br><br>

  <label>
    Email:<br>
    <input type="email" name="email" value="<?= $usuario['email']; ?>">
  </label>
  <br><br>

  <label>
    Nova senha (opcional):<br>
    <input type="password" name="senha">
  </label>
  <br><br>

  <button type="submit">Salvar</button>

</form>