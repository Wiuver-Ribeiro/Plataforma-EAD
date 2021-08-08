<?php 
  require '../../config/config.php';
  session_start();

  if(isset($_POST['alterar_senha'])):
    $email = filter_input(INPUT_POST,'email');
    $senhaAtual = filter_input(INPUT_POST,'senhaAtual');
    $novaSenha = filter_input(INPUT_POST,'novaSenha');
    $novaSenha2 = filter_input(INPUT_POST,'novaSenha2');
    
    if(empty($senhaAtual) || empty($novaSenha) || empty($novaSenha2) || empty($email)) {
      $_SESSION['erro'] = "Preencha os campos";
      header("Location:./esqueci_senha.php");
      exit;
    }else {
      $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
      $sql->bindValue(':email', $email);
      $sql->bindValue(':senha', $senhaAtual);
      $sql->execute();

      $dados = $sql->fetch(PDO::FETCH_ASSOC);

      if($sql->rowCount() > 0) {
        if($senhaAtual == $dados['senha'] && $novaSenha == $novaSenha2) {
          $sql = $pdo->prepare("UPDATE usuarios SET senha = :senha WHERE email = :email");
          $sql->bindValue(':senha',$novaSenha);
          $sql->bindValue(':email',$email);
          $sql->execute();
          $_SESSION['sucesso'] = "<script>alert('Senha alterada com sucesso');</script>";
          header("Location: ../Login/login.php");
        }
      } else {
        header("Location:./esqueci_senha.php");
         exit;
       }
    }
  endif;
?>

