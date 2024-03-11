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
function getById($conn, $id)
{
  $color = [];

  $sql = "SELECT color FROM colors WHERE id = $id";
  $result = mysqli_query($conn, $sql);

  $result_check = mysqli_num_rows($result);

  if ($result_check > 0)
    $color = mysqli_fetch_all($result, MYSQLI_ASSOC);


  return $color;
}

function storeColor($conn, $color)
{
  // echo $type;
  try {
    // Verifica se $type não está vazio
    if (empty($color)) {
      throw new Exception("A cor não pode estar vazia.");
    }

    // Prepara a consulta SQL
    $sql = "INSERT INTO colors (color) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      throw new Exception("Erro ao preparar a declaração SQL: " . mysqli_error($conn));
    }

    // Liga o parâmetro à declaração
    mysqli_stmt_bind_param($stmt, 's', $color);

    // Executa a declaração
    if (!mysqli_stmt_execute($stmt)) {
      throw new Exception("Erro ao executar a declaração SQL: " . mysqli_error($conn));
    }
    // mysqli_stmt_close($stmt);

    return [
      'id' => $stmt->insert_id,
      'color' => $color
    ];
  } catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    return false;
  }
}
