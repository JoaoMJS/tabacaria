<?php
require '../config.php';

$lista = [];

$sql = $pdo->query("SELECT * FROM usuario");

if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h2>Lista de Usuários</h2>

<a href="cadastrar.php">Cadastrar novo usuário</a>

<br><br>

<table border="1">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Email</th>
<th>Ações</th>
</tr>

<?php foreach($lista as $usuario): ?>

<tr>
<td><?php echo $usuario['id']; ?></td>
<td><?php echo $usuario['nome']; ?></td>
<td><?php echo $usuario['email']; ?></td>

<td>
<a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a> |
<a href="excluir_usuario.php?id=<?php echo $usuario['id']; ?>">Excluir</a>
</td>

</tr>

<?php endforeach; ?>

</table>
