<?php 
  require_once __DIR__ . '/../../config/config.php';

  $sql = $pdo->query("SELECT * FROM usuarios");
  $sql->execute();
  $dados[] = $sql->fetch(PDO::FETCH_ASSOC);
  // print_r($dados);
  // die();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatorio</title>
  <style>
    table {
      width: 100%;
    }
  </style>
</head>

<body>
    <table border="1px">
      <caption>Relatório de usuários</caption>
      <thead>
        <th>id</th>
        <th>Nome</th>
        <th>E-mail</th>
      </thead>
      <tbody>
        <?php foreach($dados as $dado) :?>
        <tr>
          <td><?php echo $dado['id']; ?></td>
          <td><?php echo $dado['nome']; ?></td>
          <td><?php echo $dado['email']; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</body>

</html>