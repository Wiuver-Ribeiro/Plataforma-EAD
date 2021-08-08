<?php
session_start();

require '../../config/config.php';

$id = filter_input(INPUT_GET,'id');
$sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id ");
$sql->bindValue(':id', $id);
$sql->execute();

$dados = $sql->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="./editar.css">
<div class="container">
  <form method="post">
  <h2>Editar</h2>
  <input type="hidden" value="<?php echo $dados['id']; ?>" readonly>
  <label><b>Nome</b></label>
  <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" >
  <label><b>E-mail</b></label>
  <input type="text" name="email" value="<?php echo $dados['email']; ?>" >
  <label><b>Senha</b></label>
  <input type="text" name="senha" value="<?php echo $dados['senha']; ?>" >
  <input type="submit" value="Salvar" name="editar">
</form>
</div>
<?php 
  if(isset($_POST['editar'])): 

    $nome = filter_input(INPUT_POST,'nome');
    $email = filter_input(INPUT_POST,'email');
    $senha = filter_input(INPUT_POST, 'senha');

    $sql = $pdo->prepare("UPDATE usuarios SET nome= :nome, email= :email, senha = :senha WHERE id = :id ");
    $sql->bindValue(':nome',$nome);
    $sql->bindValue(':email',$email);
    $sql->bindValue(':senha',$senha);
    $sql->bindValue(':id',$id);
    $sql->execute();

      $_SESSION['sucesso'] = "<script>alert('Usuário alterado com sucesso');</script>";
      header("Location:../../index.php");
    
  endif;
?>