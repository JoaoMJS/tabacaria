<?php
require '../config.php';

// verifica se veio ID
if(!isset($_GET['id'])) {
  header("Location: produtos.php");
  exit;
}

$id = $_GET['id'];

// procura algum produto
$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$sql->execute([$id]);

$produto = $sql->fetch(PDO::FETCH_ASSOC);

// se nao encontrar o produto, volta 
if(!$produto){
  header("Location: produtos.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?= $produto['nome']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

<!-- header -->
<header class="topo">
  <div class="container topo-interno">
    <h1 class="logo">Tamanduá</h1>

    <nav class="menu">
      <a href="index.php">Início</a>
      <a href="produtos.php">Catálogo</a>
      <a href="#">Contato</a>
    </nav>
  </div>
</header>

<!-- container produto -->
<main class="container produto-pagina">

  <section class="produto-card">

    <!-- img -->
    <div class="produto-imagem">
      <img src="../imagens/<?= $produto['imagem'] ?? 'sem-imagem.png'; ?>" 
           alt="<?= $produto['nome']; ?>">
    </div>

    <!-- dados do produto -->
    <div class="produto-dados">

      <span class="categoria-tag">
        <?= $produto['categoria'] ?? 'Sem categoria'; ?>
      </span>

      <h2><?= $produto['nome']; ?></h2>

      <p class="preco">
        R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>
      </p>

      <button class="botao-comprar">Comprar</button>

      <p class="descricao">
        <?= $produto['descricao'] ?? 'Este produto não possui descrição.'; ?>
      </p>

      <ul class="info-lista">
        <li><strong>Conteúdo:</strong> <?= $produto['conteudo'] ?? '-'; ?></li>
        <li><strong>Marca:</strong> <?= $produto['marca'] ?? '-'; ?></li>
        <li><strong>Categoria:</strong> <?= $produto['categoria'] ?? '-'; ?></li>
      </ul>

    </div>

  </section>

</main>

<!-- rodapé -->
<footer class="rodape">
  <p>© 2026 Tamanduá</p>
</footer>

</body>
</html>