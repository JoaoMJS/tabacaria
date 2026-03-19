<?php
require '../config.php';

$lista = [];

$sql = $pdo->query("SELECT * FROM produtos");

if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h2>Lista de Produtos</h2>

<table border="1">

<a href="cadastrar_produto.php">
<button>Adicionar produto</button>
</a>

<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Ações</th>
</tr>

<?php foreach($lista as $produto): ?>

<tr>
<td><?php echo $produto['id']; ?></td>
<td><?php echo $produto['nome']; ?></td>
<td><?php echo $produto['preco']; ?></td>

<td>
<a href="excluir_produto.php?id=<?php echo $produto['id']; ?>">Excluir</a></button>
<a href="../Site/produtos.php">Página no site</a>
<a href="editar_produto.php?id=<?php echo $produto['id']; ?>">Editar</a></button>
<a href="editar_produto.php?id=<?php echo $produto['id']; ?>"><button>Editar</button>
</a>
</a>
<br><br>
</td>

</tr>

<?php endforeach; ?>

</table>