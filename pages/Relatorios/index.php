<?php 

  use Dompdf\Dompdf;


  require_once __DIR__ .'../../../vendor/autoload.php';

  $dompdf = new Dompdf();
  header("Content-Type: application/pdf");
  // $html = file_get_contents('relatorio.php');
  // $dompdf->loadhtml($html);

  ob_start();
  require __DIR__."/relatorio.php";
  $dompdf->loadhtml(ob_get_clean());
  ob_end_clean();
  $dompdf->setPaper('A4','portrait');

  $dompdf->render();
  $dompdf->stream("relatorio.pdf", ["Attachment" => false]);
  // echo $dompdf->output();
?>