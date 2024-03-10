<?php
require_once '../../config.php';
require_once '../actions/ColorsAction.php';
require_once '../actions/TypesAction.php';
require_once '../actions/StockAction.php';


$types = GetTypesAction($conn);
$colors = GetColorsAction($conn);
// var_dump($types);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Outros meta tags e links podem estar presentes aqui -->
  <link rel="stylesheet" href="../../css/main.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="d-flex flex-column align-items-center">
  <?php require_once './templates/header.php'; ?>
  <main class="container d-flex flex-column">
    <div class="d-flex justify-content-between pb-3">
      <h4>Gerencie seu estoque aqui.</h4>
      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#newItemModal">+</button>
    </div>
    <table class="table">
      <thead>
        <th>Produto</th>
        <th>Tipo</th>
        <th>Cor</th>
        <th>Estoque</th>
      </thead>
      <tbody id="stockBody">
      </tbody>
    </table>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between px-3">
          <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar novo produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php require_once './templates/inventoryModal.php'; ?>
        </div>

      </div>
    </div>
  </div>


  <?php require_once './templates/footer.php'; ?>
</body>

</html>
<script>
  window.onload = function() {
    getStock();
  };

  function getStock() {
    <?php $clothes = getStockAction($conn); ?>
    var clothes = <?php echo $clothes; ?>;
    console.log(clothes)

    var tbody = document.getElementById('stockBody');

    // Limpar o tbody antes de adicionar novas linhas
    tbody.innerHTML = '';

    // Iterar sobre os dados de clothes e adicionar uma linha para cada item
    clothes.forEach(function(cloth) {
      var row = tbody.insertRow(); // Criar uma nova linha

      // Adicionar células para cada coluna da tabela
      var product = row.insertCell(0);
      var type = row.insertCell(1);
      var color = row.insertCell(2);
      var stock = row.insertCell(3);
      // Adicione mais células conforme necessário

      // Preencher as células com os dados do item
      type.textContent = cloth.type_id;
      color.textContent = cloth.color_id;
      product.textContent = cloth.product;
      stock.textContent = cloth.stock;
      // Preencha outras células conforme necessário
    });
  }
</script>

<!-- <body class="d-flex flex-column align-items-center">
  
</body> -->