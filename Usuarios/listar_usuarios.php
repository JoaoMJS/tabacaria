<?php
session_start();
require '../config.php';

$usuarios = [];

$sql = $pdo->query("SELECT id, nome, email, criado_em FROM usuarios");

if($sql->rowCount() > 0){
  $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Usuários</title>
  <link rel="stylesheet" href="../Site/estilo.css">
</head>

<body>

<header class="topo">
  <div class="container topo-interno">
    <h1 class="logo">Usuários do Site</h1>

    <nav class="menu">
      <a href="../Site/index.php">Início</a>
      <a href="../Site/produtos.php">Produtos</a>

      <?php if(isset($_SESSION['usuario'])): ?>
        <a href="logout.php">Sair</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </nav>
  </div>
</header>

<main class="container">

  <h2>Usuários cadastrados</h2>

  <table style="width:100%; margin-top:20px; border-collapse: collapse;">

    <tr style="background:#222;">
      <th style="padding:10px;">ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Data de criação</th>
    </tr>

    <?php foreach($usuarios as $user): ?>

    <tr style="border-bottom:1px solid #333; text-align:center;">
      <td style="padding:10px;"><?= $user['id']; ?></td>
      <td><?= $user['nome']; ?></td>
      <td><?= $user['email']; ?></td>
      <td><?= $user['criado_em']; ?></td>
    </tr>

    <?php endforeach; ?>

  </table>

</main>

</body>
</html>