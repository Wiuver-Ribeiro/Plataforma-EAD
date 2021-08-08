<?php session_start();
  if(isset($_SESSION['area_restrita'])) {
    echo $_SESSION['area_restrita'];
    echo $_SESSION['area_restrita'] = '';
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <form action="../Login/verifica_login.php" method="POST">
      <h2>Login</h2>
      <label for="email">E-mail:</label>
      <input type="text" id="email" name="email" placeholder="E-mail">
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="Senha" autocomplete="off">
      <div class="checkbox">

        <input type="checkbox"> 
        <label for="checkbox">Manter-me logado</label>
      </div>

      <input type="submit" value="Logar" name="login">
      <div class="btn-acoes">
        <a class="esqueci_senha" href="../Recuperar/esqueci_senha.php">Esqueci minha senha</a>
        <span class="nao_tem_conta">Ainda não tem  conta?</span>
        <a class="link" href="../Cadastrar/adicionar.php">Cadastre-se</a>
      </div>
    </form>
    <?php if (isset($_SESSION['nao_autenticado'])) {
      echo "<span class='warning'>{$_SESSION['nao_autenticado']}</span>";
      $_SESSION['nao_autenticado'] = '';
    }

    if (isset($_SESSION['null'])) {
      echo "<span class='warning'>{$_SESSION['null']}</span>";
      $_SESSION['null'] = '';
    }

    if(isset($_SESSION['verifica'])) {
      echo $_SESSION['verifica'];
      $_SESSION['verifica'] = '';
    }

    if(isset($_SESSION['cadastrado'])) {
      echo $_SESSION['cadastrado'];
      $_SESSION['cadastrado'] = '';
    }

    if(isset($_SESSION['sucesso'])) {
      echo $_SESSION['sucesso'];
      $_SESSION['sucesso'] = '';
    }
    ?>
  </div>
  <p style="text-align:center; margin-bottom:1rem;">Desenvolvido por Wiuver A Ribeiro &copy;</p>
</body>

</html>