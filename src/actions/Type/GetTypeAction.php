<?php 

require_once '../database/Type/Get.php';

function GetTypeAction($conn){
  return getClothingType($conn);
}