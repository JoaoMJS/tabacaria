<?php
require '../config.php';
$id = $_GET['id'] ?? null;

if($id) {

    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = ?");
    $sql->execute([$id]);

    if($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: listar_usuarios.php");
        exit;
    }

} else {
    header("Location: listar_usuarios.php");
    exit;
}
?>

<h1>Editar Usuário</h1>

<form method="POST" action="editar_usuario_action.php">

    <input type="hidden" name="id" value="<?= $usuario['id']; ?>">

    <label>
        Nome:<br>
        <input type="text" name="nome" value="<?= $usuario['nome']; ?>">
    </label>

    <br><br>

    <label>
        Email:<br>
        <input type="email" name="email" value="<?= $usuario['email']; ?>">
    </label>

    <br><br>

    <input type="submit" value="Salvar">

</form>

<br>

<a href="listar_usuarios.php">← Voltar</a>