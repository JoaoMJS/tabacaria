<!DOCTYPE html>
<html>
<head>
  <title>Criar Conta</title>
  <link rel="stylesheet" href="../Site/estilo.css">
</head>

<body>

<div class="container">
  <h2>Criar Conta</h2>

  <form method="POST" action="cadastro_action.php">

    <input type="text" name="nome" placeholder="Nome" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="senha" placeholder="Senha" required><br><br>

    <button type="submit">Cadastrar</button>

  </form>

  <p>Já tem conta? <a href="login.php">Entrar</a></p>
</div>

</body>
</html>