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

<body>
  <div class="d-flex flex-column align-items-center">
    <?php require_once './templates/header.php'; ?>
    <main class="container d-flex flex-column">
      <div class="d-flex justify-content-between pb-3">
        <h4>Gerencie seu estoque aqui.</h4>
        <div>
          <button type="button" class="btn btn-dark" onclick="getStock()">Atualizar</button>
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#newItemModal">+</button>

        </div>
      </div>
      <div id="mainSuccessDiv" class="p-3 mb-2 bg-success text-white d-none">Item cadastrado com sucesso!</div>
      <table class="table">
        <thead>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Cor</th>
          <th>Estoque</th>
          <th>Ações</th>
        </thead>
        <tbody id="stockBody">
        </tbody>
      </table>
    </main>
    <?php require_once './templates/footer.php'; ?>
  </div>
  <?php require_once './templates/inventoryModal.php'; ?>


  




</body>

</html>
<script>
  window.onload = function() {
    getStock();
  };

  function getStock() {
    <?php $clothes = getStockAction($conn); ?>
    var clothes = <?php echo $clothes; ?>;

    var tbody = document.getElementById('stockBody');

    // Limpar o tbody antes de adicionar novas linhas
    tbody.innerHTML = '';

    // Iterar sobre os dados de clothes e adicionar uma linha para cada item
    clothes.forEach(function(cloth) {
      var row = tbody.insertRow();

      var product = row.insertCell(0);
      var type = row.insertCell(1);
      var color = row.insertCell(2);
      var stock = row.insertCell(3);
      var actions = row.insertCell(4);

      type.textContent = cloth.type_name;
      color.textContent = cloth.color_name;
      product.textContent = cloth.product;
      stock.textContent = cloth.stock;

      var editButton = document.createElement("button");
      editButton.textContent = "Editar";
      editButton.setAttribute("data-toggle", "modal");
      editButton.setAttribute("data-target", "#newItemModal");

      editButton.addEventListener("click", function() {
        populateCloth(cloth)
      });

      var deleteButton = document.createElement("button");
      deleteButton.textContent = "Excluir";
      deleteButton.addEventListener("click", function() {
        $.ajax({
          type: "POST",
          url: "../actions/StockAction.php",
          data: {
            action: 'deleteStock',
            id: cloth.id
          },
          success: function(response) {
            console.log(response)
          }
        });
      });

      actions.appendChild(editButton);
      actions.appendChild(deleteButton);

    });
  }
</script>

<!-- <body class="d-flex flex-column align-items-center">
  
</body> -->