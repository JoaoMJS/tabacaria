<?php
require '../config.php';

$produtos = [];

$sql = $pdo->query("SELECT * FROM produtos");

if($sql->rowCount() > 0){
    $produtos = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Produtos</title>
<link rel="stylesheet" href="estilo.css">
</head>

<body>

<h1>Produtos</h1>

<div class="lista-produtos">

<?php foreach($produtos as $produto): ?>

<div class="produto">

<h3><?php echo $produto['nome']; ?></h3>

<p>R$ <?php echo $produto['preco']; ?></p>

<a href="produto.php?id=<?php echo $produto['id']; ?>">
Ver produto
</a>

</div>

<?php endforeach; ?>

</div>

</body>
</html>