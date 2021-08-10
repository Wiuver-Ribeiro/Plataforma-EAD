<?php session_start();
require '../../config/config.php'; 
// if(isset($_SESSION['nivel_acesso'])) {
//   echo "<script></script>";
// } else {
//   header("Location: ../Login/login.php");
//   $_SESSION['area_restrita'] = "Área restrita";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Cadastrar/cadastrar.css">
  <title>Recuperar senha</title>
</head>

<body>

  <div class="container">
    <form method="POST">
      <h2>Cadastrar</h2>
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" placeholder="Nome Completo">
      <label for="email">E-mail:</label>
      <input type="text" id="email" name="email" placeholder="contato@gmail.com">
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="Senha" autocomplete="off">
      <input type="submit" value="Cadastrar" name="cadastrar">
      <div class="btn-acoes">
        <a class="nao_tem_conta">Já tem conta?</a>
        <a class="link" href=".././Login/login.php">Ir para login</a>

      </div>
    </form>
    <p style="text-align:center;">Desenvolvido por Wiuver A Ribeiro &copy;</p>
</body>

</html>

<?php
if (isset($_SESSION['null'])) {
  echo $_SESSION["null"];
  $_SESSION["null"] = '';
}
?>
<?php

if (isset($_POST['cadastrar'])) :

  $nome = trim(filter_input(INPUT_POST, 'nome'));
  $email = trim(filter_input(INPUT_POST, 'email'));
  $senha = trim(filter_input(INPUT_POST, 'senha'));

  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email ");
  $sql->bindValue(':email', $email);
  $sql->execute();

  $dados = $sql->fetch(PDO::FETCH_ASSOC);
  if (empty($nome) && empty($email) && empty($senha)) {
    $_SESSION['null'] = "Preencha os campos";

  } else if ($email == $dados['email']) {
    echo "<script>alert('E-mail: já cadastrado');</script>";
    
  } else {
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha,nivel_acesso) VALUES(:nome, :email, :senha, 1)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();

    $_SESSION['cadastrado'] = "<script>alert('Usuário cadastrado com sucesso');</script>";
    header("Location:../../index.php");

    exit;
  }
endif;
?>