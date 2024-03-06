<?php


function getColor($conn)
{
  $colors = [];

  $sql = "SELECT * FROM colors";
  $result = mysqli_query($conn, $sql);
  
  $result_check = mysqli_num_rows($result);

  if ($result_check > 0)
    $colors = mysqli_fetch_all($result, MYSQLI_ASSOC);


  return $colors;
}
