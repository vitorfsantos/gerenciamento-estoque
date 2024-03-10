<?php

require_once '../database/Types.php';
require_once '../../config.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch ($action) {
    case 'storeTypeAction':
      return storeTypeAction($conn);
  }
}

function GetTypesAction($conn)
{
  return getClothingType($conn);
}

function storeTypeAction($conn)
{
  $salvar = storeType($conn, $_POST['type']);
  echo json_encode($salvar);
}
