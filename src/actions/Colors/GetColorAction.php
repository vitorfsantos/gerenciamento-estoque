<?php 

require_once '../database/Color/Get.php';

function GetColorAction($conn){
  return getColor($conn);
}