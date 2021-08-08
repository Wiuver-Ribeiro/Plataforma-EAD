<?php 
  require_once __DIR__ . '/../../config/config.php';
session_start();
  $sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id =".$_SESSION['idUser']);
  $sql->execute();
  $dados = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatorio</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      /* font-size: 86.5%; */
    }

    /* CLASSE DOS H2 */
    .titles {
      text-align: center;
      background-color: green;
      color: #fff;
      letter-spacing: 1px;
      font-size: 14px;
    }


    .container {
      width: 100%;
      max-width: 600px;
      margin: 10px auto;
      border: 1px solid #000;
      padding: 1.2rem;
      height: auto;
    }

    .container .logo {
      display: flex;
      justify-content: center;
      border-bottom: 1px solid #000;
      background-color: rgba(24, 24, 26, 0.3);
      padding: 1rem 0;
    }

    .container .content-box {
      padding: 10px 0;
    }


    .container .content-box .content-information span {
      display: block;
      margin-bottom: 12px;
    }

    .container .table {
      /* display: flex; */
      flex-direction: column;
      justify-content: center;
      border: 1px solid #000;
    }

    .container .table table {
      width: 100%;
      text-align: center;
      border-collapse: collapse;
    }

    .container .table table caption {
      background-color: green;
      padding: 3px 0;
      font-size: 12px;
      color: #fff;
      font-weight: bold;
    }

    .container .table table thead th {
      font-size: 12px;
    }

    /* Quebrar palavra */
    .container .table table textarea {
      width: 100%;
      word-wrap: break;
      text-indent: 10px;
      font-size: 13px;
    }

    .container .table .more-information {
      padding: 8px;
    }

    .container .table .more-information p {
      font-size: 13px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .container .table .more-information textarea {
      width: 100%;
      resize: none;
      /* border:none; */
    }

    .box-signature {
      display:flex;
      margin-top: 2rem;
    }

    .box-signature .signature .self{
        float: left;
    }

    .box-signature .signature p {
      width: 100%;
      max-width: 350px;
      margin: 0 auto;
      border-top: 1px solid #000;
      /* margin-bottom: 8px; */
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="logomarca.png" alt="Logomarca" width="200px">
    </div>
    <div class="content-box">
      <div class="content-information">
        <h2 class="titles">AUTORIZAÇÃO DE HORAS EXTRAS</h2>
        <span>FUNCIONÁRIO:<?php echo $dados['nome']; ?></span>
        <span>MATRÍCULA:</span>
        <span>DEPARTAMENTO:</span>
        <span>UNIDADE:</span>
        <span>DATA:</span>
      </div>
    </div>
    <div class="table">
      <table border="1">
        <caption>HORÁRIOS EXTRAORDINÁRIOS</caption>
        <thead>
          <tr>
            <th>DIA</th>
            <th>H1 <br>ENTRADA</th>
            <th>H2 <br>SAÍDA</th>
            <th>H3 <br>ENTRADA</th>
            <th>H4 <br>SAÍDA</th>
            <th>JUSTIFICATIVA</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>06/08/2021</td>
            <td>9:00</td>
            <td>11:00</td>
            <td>12:00</td>
            <td>17:00</td>
            <td class="break-word">
              <textarea style="resize: none;" name="" id="" cols="28" rows="2"></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="more-information">
        <p>COOPERATIVA RESPONSÁVEL POR REEMBOLSO DA HORA EXTRA, SE FOR DEMANDA ESPECÍFICA:</p>
        <textarea name="" id=""></textarea>
      </div>
      <div class="more-information">
        <p>OUTRAS INFORMAÇÕES COMPLEMENTARES</p>
        <textarea name="" id=""></textarea>
      </div>
      <div class="autorization">
        <h2 class="titles">AUTORIZAÇÃO</h2>
        <div class="box-signature">
          <div class="signature">
            <p>DIRETOR</p>
          </div>
          <div class="signature self">
            <p>GERENTE OU SUPERVISOR</p>
          </div>
        </div>
        <div class="box-signature">
          <div class="signature">
            <p>S0LICITANTE</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>