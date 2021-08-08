<?php
session_start();
require '../../config/config.php';

$id = filter_input(INPUT_GET,'id');

$sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id ");
$sql->bindValue(':id', $id);
$sql->execute();

if($sql) {
  $_SESSION['excluido'] = "Usuário excluido com sucesso!";
  header("Location:../../index.php");
}