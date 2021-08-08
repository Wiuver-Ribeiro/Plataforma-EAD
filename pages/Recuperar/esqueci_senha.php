<?php session_start();
require '../../config/config.php';
if (isset($_SESSION['erro'])) {
  echo $_SESSION['erro'];
  $_SESSION['erro'] = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Recuperar/esqueci_senha.css">
  <title>Recuperar senha</title>
</head>

<body>

  <div class="container">
    <form method="POST" action="./valida_senha.php">
      <h2>Recuperar Senha</h2>
      <label for="email">E-mail</label>
      <input type="text" id="email" name="email" placeholder="E-mail">
      <label for="senha_atual">Senha atual:</label>
      <input type="password" id="senha_atual" name="senhaAtual" placeholder="Senha Atual">
      <label for="newSenha">Nova senha:</label>
      <input type="password" id="newSenha" name="novaSenha" placeholder="Nova senha">
      <label for="senha" class="att">Digite novamente:</label>
      <input type="password" id="senha" name="novaSenha2" placeholder="Digite novamente a senha" autocomplete="off">
      <input type="submit" value="Alterar" name="alterar_senha">
      <div class="btn-acoes">
        <a class="nao_tem_conta">Já tem conta?</a>
        <a class="link" href=".././Login/login.php">Ir para login</a>
        <?php if (isset($_SESSION['erro'])) {
          echo $_SESSION['erro'];
          $_SESSION['erro'] = '';
        }
        if(isset($_SESSION['senha'])) {
          echo $_SESSION['senha'];
          $_SESSION['senha'] = '';
        }
         ?>

      </div>
    </form>
    <p style="text-align:center;">Desenvolvido por Wiuver A Ribeiro &copy;</p>
</body>

</html>