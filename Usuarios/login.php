<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../Site/estilo.css">
</head>

<body>

<div class="container">
  <h2>Login</h2>

  <form method="POST" action="login_action.php">

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="senha" placeholder="Senha" required><br><br>

    <button type="submit">Entrar</button>

  </form>

  <p>Não tem conta? <a href="cadastro.php">Cadastrar</a></p>
</div>

</body>
</html>