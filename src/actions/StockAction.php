<?php
require_once '../database/Stock.php';
require_once '../../config.php';

if (isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch ($action) {
    case 'storeStock':
      return storeStockAction($conn);
    case 'getStock':
      echo getStockAction($conn);
  }
}
function storeStockAction($conn){
  return storeStock($conn, $_POST['stockItem']);
}

function getStockAction($conn){
  
  // var_dump(getStock($conn));
  return json_encode(getStock($conn));
}