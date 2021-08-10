<?php
session_start();
require_once '../../config/config.php';

if (isset($_POST['login'])) :

  $email = filter_input(INPUT_POST, 'email');
  $senha = filter_input(INPUT_POST, 'senha');

  if (empty($email) && empty($senha)) {
    $_SESSION['verifica'] = "<script>alert('Preencha os campos...')</script>";
    header("Location:../../Pages/Login/login.php");
  } else {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email and senha = :senha ");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();


    if ($sql->rowCount() > 0) {
      //Transforma dado em um array com toda as informações do usuário
      $dado = $sql->fetch(PDO::FETCH_ASSOC);


      if ($email == $dado['email'] && $senha == $dado['senha'] && $dado['nivel_acesso'] == '0') {
        $_SESSION['login'] = true;
        $_SESSION['nome'] = $dado['nome'];
        $_SESSION['nivel_acesso'] = $dado['nivel_acesso'];
        $_SESSION['idUser'] = $dado['id'];
          //Manda pro painela administrativo
        header("Location:../Administrativo/adm.php");
        exit;
      } else if ($email == $dado['email'] && $senha == $dado['senha'] && $dado['nivel_acesso'] == '1') {
        $_SESSION['login'] = true;
        $_SESSION['nome'] = $dado['nome'];

        //Manda usuario pra tela de usuario
        header("Location:../Dashboard/dashboard.php");
        exit;
      }
    } else {
      $_SESSION['nao_autenticado'] = "e-mail ou senha incorretos";
      header("Location:login.php");
      exit;
    }
  }
endif;
