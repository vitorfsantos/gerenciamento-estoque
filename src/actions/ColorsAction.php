<?php

require_once '../database/Colors.php';
require_once '../../config.php';


if (isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch ($action) {
    case 'storeColorAction':
      return storeColorAction($conn);
  }
}

function GetColorsAction($conn)
{
  return getColor($conn);
}

function storeColorAction($conn)
{
  $salvar = storeColor($conn, $_POST['color']);
  echo json_encode($salvar);
}
