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

function storeType($conn, $type)
{
  // echo $type;
  try {
    // Verifica se $type não está vazio
    if(empty($type)) {
        throw new Exception("O tipo de roupa não pode estar vazio.");
    }

    // Prepara a consulta SQL
    $sql = "INSERT INTO clothing_type (type_name) VALUES (?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        throw new Exception("Erro ao preparar a declaração SQL: " . mysqli_error($conn));
    }

    // Liga o parâmetro à declaração
    mysqli_stmt_bind_param($stmt, 's', $type);

    // Executa a declaração
    if(!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erro ao executar a declaração SQL: " . mysqli_error($conn));
    }

    // Fecha a conexão
    mysqli_stmt_close($stmt);
    
    // Retorna verdadeiro se a inserção foi bem-sucedida
    return true;
} catch (Exception $e) {
    // Retorna falso se ocorrer algum erro
    echo "Erro: " . $e->getMessage();
    return false;
}
    
}
