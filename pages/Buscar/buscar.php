<?php 
session_start();

require '../../config/config.php';

$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
?>
<link rel="stylesheet" href="../../assets/style.css">
<a class="add" title="Voltar" href="../../index.php" style="margin-left: 2rem;"><i class="fas fa-arrow-left"></i> Voltar</a>

<?php
if(isset($_POST['buscar'])): 
  if(empty($nome)) {
    $_SESSION['error'] = "Campos vazios...";
    header("Location:../../index.php");
  } else {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :nome ");
    $sql->bindValue(':nome',$nome.'%');
    $sql->execute();

    ?>
    <table border="1" width="100%">
      <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th colspan="2">Opções</th>
      </tr>
      <?php while($dados = $sql->fetch(PDO::FETCH_ASSOC)) {?>
      <tr>
        <td><?php echo $dados['id']; ?></td>
        <td><?php echo $dados['nome']; ?></td>
        <td><?php echo $dados['email']; ?></td>
        <td><a class="edit" title="Editar" href="../Editar/editar.php?id=<?php echo $dados['id']; ?> "><i class="fas fa-pencil-alt fa-lg "></i>Editar</a></td>
      <td><a class="delete" title="Excluir" href="../Excluir/excluir.php?id=<?php echo $dados['id']; ?> "><i class="fas fa-trash-alt fa-lg "></i>Excluir</a></td>
      </tr>
      <?php } ?> 
    </table>

    <?php
  }
endif;
?>

<script src="https://kit.fontawesome.com/dba7af9f9b.js" crossorigin="anonymous"></script>
