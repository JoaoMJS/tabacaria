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
  <title>Tabacaria Tamanduá</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

<!-- HEADER -->
<header class="topo">
  <div class="container topo-interno">
    <h1 class="logo">Tamanduá</h1>

    <nav class="menu">
      <a href="#">Início</a>
      <a href="produtos.php">Produtos</a>
      <a href="#">Contato</a>
    </nav>
  </div>
</header>

<!-- BANNER -->
<section class="banner-principal">
  <div class="banner-conteudo">
    <h2>Ofertas Imperdíveis</h2>
    <p>Os melhores produtos da sua tabacaria</p>
    <a href="produtos.php" class="botao-banner">Ver Catálogo</a>
  </div>
</section>

<!-- CATEGORIAS -->
<section class="container categorias">
  <h2>Categorias</h2>

  <div class="categorias-grid">
    <div class="categoria">Cigarros</div>
    <div class="categoria">Charutos</div>
    <div class="categoria">Isqueiros</div>
    <div class="categoria">Acessórios</div>
    <div class="categoria">Bebidas</div>
  </div>
</section>

<!-- PRODUTOS -->
<section class="container">
  <h2>Produtos</h2>

  <div class="produtos-grid">

    <?php foreach($produtos as $produto): ?>

      <div class="produto-card">

        <img src="../imagens/<?php echo $produto['imagem']; ?>" alt="">

        <div class="produto-info">
          <h3><?php echo $produto['nome']; ?></h3>
          <p>R$ <?php echo $produto['preco']; ?></p>

          <a href="produto.php?id=<?php echo $produto['id']; ?>">
            <button class="botao-comprar">Ver produto</button>
          </a>
        </div>

      </div>

    <?php endforeach; ?>

  </div>
</section>

<!-- FOOTER -->
<footer class="rodape">
  <p>© 2026 Tamanduá</p>
</footer>

</body>
</html>