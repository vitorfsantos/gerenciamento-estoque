<?php 

require_once '../database/Colors.php';
require_once '../../config.php';

// Verificar se foi enviado um valor via POST
if (isset($_POST['color'])) {
  $salvar = storeColor($conn, $_POST['color']);
  echo json_encode($salvar);
  // return $salvar;
}

function GetColorsAction($conn){
  return getColor($conn);
}