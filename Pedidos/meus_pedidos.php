<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require '../config.php';

if(!isset($_SESSION['usuario'])){
    header("Location: ../Usuarios/login.php");
    exit;
}

$usuario_id = $_SESSION['usuario'];

$sql = $pdo->prepare("SELECT * FROM pedidos WHERE usuario_id = ?");
$sql->execute([$usuario_id]);

$pedidos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Meus Pedidos</h2>

<?php foreach($pedidos as $pedido): ?>

  <div>
    <p><strong>Pedido #<?= $pedido['id'] ?></strong></p>
    <p>Total: R$ <?= $pedido['total'] ?></p>
    <p>Endereço: <?= $pedido['endereco'] ?></p>

    <?php
    $sql = $pdo->prepare("SELECT * FROM itens_pedido WHERE pedido_id = ?");
    $sql->execute([$pedido['id']]);
    $itens = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <ul>
      <?php foreach($itens as $item): ?>
        <li>
          <?= $item['nome'] ?> - 
          <?= $item['quantidade'] ?>x
        </li>
      <?php endforeach; ?>
    </ul>

  </div>

<?php endforeach; ?>