<?php
require '../config.php';

$produtos = [];

$sql = $pdo->query("SELECT * FROM produtos");

if($sql->rowCount() > 0){
    $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Produtos - Tamanduá</title>
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

<!-- HEADER -->
<header class="topo">
  <div class="container topo-interno">
    <h1 class="logo">Tamanduá</h1>

    <nav class="menu">
      <a href="index.php">Início</a>
      <a href="produtos.php">Produtos</a>
      <a href="#">Contato</a>
    </nav>
  </div>
</header>

<!-- CONTEÚDO -->
<main class="container">

  <h2>Catálogo de Produtos</h2>

  <div class="produtos-grid">

    <?php foreach($produtos as $produto): ?>

      <div class="produto-card">

        <img src="../imagens/<?php echo $produto['imagem']; ?>" alt="">

        <div class="produto-info">
          <h3><?php echo $produto['nome']; ?></h3>

          <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>

          <a href="produto.php?id=<?php echo $produto['id']; ?>">
            <button class="botao-comprar">Ver produto</button>
          </a>
        </div>

      </div>

    <?php endforeach; ?>

  </div>

</main>

<!-- FOOTER -->
<footer class="rodape">
  <p>© 2026 Tamanduá</p>
</footer>

</body>
</html>