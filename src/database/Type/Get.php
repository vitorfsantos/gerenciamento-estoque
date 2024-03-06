<?php


function getClothingType($conn)
{
  $types = [];

  $sql = "SELECT * FROM clothing_type";
  $result = mysqli_query($conn, $sql);

  $result_check = mysqli_num_rows($result);

  if ($result_check > 0)
    $types = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // mysqli_close($conn);

  return $types;
}
