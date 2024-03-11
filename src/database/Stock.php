<?php
function storeStock($conn, $stockItem)
{
  // echo $type;
  try {
    // Recebendo os valores e escapando para prevenção de SQL injection
    $type_id = mysqli_real_escape_string($conn, $stockItem['type_id']);
    $color_id = mysqli_real_escape_string($conn, $stockItem['color_id']);
    $product = mysqli_real_escape_string($conn, $stockItem['product']);
    $stock = mysqli_real_escape_string($conn, $stockItem['stock']);

    // Verificando se todos os valores esperados estão presentes no array $stockItem
    if (!isset($stockItem['type_id'], $stockItem['color_id'], $stockItem['product'], $stockItem['stock'])) {
      exit('Valores incompletos.');
    }

    // Preparando a consulta SQL
    $sql = "INSERT INTO clothes (type_id, color_id, product, stock) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    // Verificando se a preparação da declaração foi bem-sucedida
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      exit('Erro na preparação da declaração.');
    }

    // Vinculando os valores aos marcadores de posição na consulta preparada
    mysqli_stmt_bind_param($stmt, 'ssss', $type_id, $color_id, $product, $stock);

    // Executando a declaração SQL
    if (!mysqli_stmt_execute($stmt)) {
      exit('Erro ao executar a declaração.');
    }

    // Fechando a declaração e a conexão com o banco de dados
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return true;
  } catch (Exception $e) {
    // Retorna falso se ocorrer algum erro
    echo "Erro: " . $e->getMessage();
    return false;
  }
}

function getStock($conn){
  $clothes = [];

  $sql = "SELECT c.*, co.color AS color_name, t.type_name AS type_name
  FROM clothes c
  INNER JOIN colors co ON c.color_id = co.id
  INNER JOIN clothing_type t ON c.type_id = t.id";

  $result = mysqli_query($conn, $sql);

  $result_check = mysqli_num_rows($result);

  if ($result_check > 0)
    $clothes = mysqli_fetch_all($result, MYSQLI_ASSOC);

  return $clothes;
}
function deleteStock($conn, $id){
  
  // $clothes = [];

  $sql = "DELETE FROM clothes WHERE id=$id";

  return mysqli_query($conn, $sql);

 
}
