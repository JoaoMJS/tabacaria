<?php
session_start();

$carrinho = $_SESSION['carrinho'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Carrinho</title>
  <link rel="stylesheet" href="/TABACARIA/site/estilo.css">
</head>

<body>

<div class="container carrinho-container">

  <h2 class="carrinho-titulo">🛒 Seu Carrinho</h2>

  <?php if(empty($carrinho)): ?>
    <p class="carrinho-vazio">Seu carrinho está vazio.</p>

  <?php else: ?>

    <?php foreach ($carrinho as $item): 
      $subtotal = $item['preco'] * $item['quantidade'];
      $total += $subtotal;
    ?>

<div class="carrinho-item">

<img src="../imagens/<?php echo $item['imagem']; ?>" width="60">

<div class="item-info">
  <span class="item-nome"><?= $item['nome'] ?></span>
  <span class="item-quantidade">
    Quantidade: <?= $item['quantidade'] ?>
  </span>
</div>

<div class="item-preco">
  R$ <?= number_format($subtotal, 2, ',', '.') ?>
</div>

</div>

  <div class="item-info">
    <span class="item-nome"><?= $item['nome'] ?></span>

    <!-- alterar quantidade -->
    <form action="atualizar_quantidade.php" method="POST">
      <input type="hidden" name="produto_id" value="<?= $item['produto_id'] ?>">
      <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1">
      <button type="submit">Atualizar</button>
    </form>

    <!-- remover -->
    <a href="remover_item.php?id=<?= $item['produto_id'] ?>">
      <button>Remover</button>
    </a>
  </div>

  <div class="item-preco">
    R$ <?= number_format($subtotal, 2, ',', '.') ?>
  </div>

</div>

    <?php endforeach; ?>

    <div class="carrinho-total">
      Total: R$ <?= number_format($total, 2, ',', '.') ?>
    </div>

    <form action="finalizar_pedido.php" method="POST">
      <button class="botao-finalizar">Finalizar Pedido</button>
    </form>

  <?php endif; ?>

</div>

</body>
</html>