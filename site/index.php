<?php
require '../config.php';

$produtos = [];

$sql = $pdo->query("SELECT * FROM produtos");

if($sql->rowCount() > 0 ){
  $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Loja Virtual</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

<header class="topo">
  <div class="container topo-interno">
    <h1 class="logo">Tamanduá</h1>

    <nav class="menu">
      <a href="#">Início</a>
      <a href="#">Catálogo</a>
      <a href="#">Contato</a>
    </nav>
  </div>
</header>

<section class="banner-principal">
  <div class="overlay"></div>
  <div class="container texto-banner">
    <h2>Ofertas Imperdíveis</h2>
    <p>Confira nossos produtos exclusivos</p>
    <a href="#" class="botao-banner">Catálogo</a>
  </div>
</section>

<section class="categorias container">
  <h2>Categorias</h2>

  <div class="grade-categorias">
    <div class="categoria">Cigarro</div>
    <div class="categoria">Cinzeiros</div>
    <div class="categoria">Charutos</div>
    <div class="categoria">Acessórios</div>
    <div class="categoria">Bebidas não alcoólicas</div>
    <div class="categoria">Vinhos</div>
    <div class="categoria">Isqueiros</div>
  </div>
</section>

<section class="produtos container">
  
<h2>Produtos da Tabacaria</h2>

<?php foreach($produtos as $produto): ?>

<div class="produto-card">

<img src="../imagens/<?php echo $produto['imagem']; ?>" width="200">

  <h3><?php echo $produto['nome']; ?></h3>

  <p>R$ <?php echo $produto['preco']; ?></p>

</div>

<?php endforeach; ?>
</section>

<footer class="rodape">
  <p>© 2025 Tamanduá</p>
</footer>

</body>
</html>
