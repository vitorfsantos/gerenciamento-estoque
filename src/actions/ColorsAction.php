<?php 

require_once '../database/Colors.php';

function GetColorsAction($conn){
  return getColor($conn);
}