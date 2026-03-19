<?php
require '../config.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$sql->execute([$id]);

$produto = $sql->fetch(PDO::FETCH_ASSOC);
?>

<h1>Editar Produto</h1>

<form method="POST" action="editar_produto_action.php">

<input type="hidden" name="id" value="<?php echo $produto['id']; ?>"/>

<label>
Nome:<br>
<input type="text" name="nome" value="<?php echo $produto['nome']; ?>"/>
</label>

<br><br>

<label>
Preço:<br>
<input type="text" name="preco" value="<?php echo $produto['preco']; ?>"/>
</label>

<br><br>

<input type="submit" value="Salvar alterações"/>

</form>

<br>

<a href="listar_produtos.php">Voltar</a>