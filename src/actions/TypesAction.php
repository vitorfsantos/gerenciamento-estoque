<?php

require_once '../database/Types.php';
require_once '../../config.php';
// Verificar se foi enviado um valor via POST
if (isset($_POST['type'])) {
  return store($conn, $_POST['type']);
}

function GetTypesAction($conn)
{
  return getClothingType($conn);
}

function store($conn, $type)
{
  return storeType($conn, $type);
}
