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
      <tbody>
      </tbody>
    </table>
  </main>

  <!-- create item -->
  <!-- Modal -->
  <div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php require_once './templates/inventoryModal.php'; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  
  <?php require_once './templates/footer.php'; ?>
</body>

</html>

<head>

</head>

<!-- <body class="d-flex flex-column align-items-center">
  
</body> -->