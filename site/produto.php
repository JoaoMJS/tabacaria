<?php
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$sql->execute([$id]);

$produto = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?php echo $produto['nome']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilo.css">
</head>

<body>

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

<main class="container produto-pagina">

  <section class="produto-card">

    <div class="produto-imagem">
      <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
    </div>

    <div class="produto-dados">

      <span class="categoria-tag"><?php echo $produto['categoria']; ?></span>

      <h2><?php echo $produto['nome']; ?></h2>

      <p class="preco">R$ <?php echo $produto['preco']; ?></p>

      <button class="botao-comprar">Comprar</button>

      <p class="descricao">
        <?php echo $produto['descricao']; ?>
      </p>

      <ul class="info-lista">
        <li><strong>Conteúdo:</strong> <?php echo $produto['conteudo']; ?></li>
        <li><strong>Marca:</strong> <?php echo $produto['marca']; ?></li>
        <li><strong>Categoria:</strong> <?php echo $produto['categoria']; ?></li>
      </ul>

    </div>

  </section>

</main>

<footer class="rodape">
  <p>© 2025 Tamanduá</p>
</footer>

</body>
</html>