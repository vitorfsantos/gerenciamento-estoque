<div class="row flex-center">
  <div class="form-div container">
    <form class="form px-3" action="../../pages/user/create.php" method="POST">
      <div class="form-group">
        <label>Tipo</label>
        <div class="d-flex">
          <select name="color" id="color" class="form-control">
            <?php foreach ($types as $type) { ?>
              <option value="<?= $type['id'] ?>"><?php echo $type['type_name'] ?></option>
            <?php } ?>
          </select>
          <button class="btn btn-primary">+</button>
        </div>
        <div class="">
          <form id="newTypeForm">
            <div class="d-flex g-2">
              <label for="newType">Novo Tipo:</label>
              <input type="text" name="newType" id="newType" class="">
              <button type="button" onclick="createType()" id="newTypeBtn">Cadastrar tipo</button>
            </div>
          </form>
        </div>
      </div>
      <div class="form-group">
        <label>Cor</label>
        <div class="d-flex">
          <select name="color" id="color" class="form-control">
            <?php foreach ($colors as $color) { ?>
              <option value="<?= $color['id'] ?>"><?php echo $color['color'] ?></option>
            <?php } ?>
          </select>
          <button class="btn btn-primary">+</button>
        </div>
      </div>
      <div class="form-group">
        <label>Produto</label>
        <input type="text" name="product" required class="form-control" />
      </div>
      <div class="form-group">
        <label>Quantia em estoque</label>
        <input type="number" name="stock" required class="form-control" />
      </div>
      <button class="btn btn-success text-white" type="submit">Save</button>
    </form>
  </div>
</div>

<script>

  function createType(){
    newType = document.getElementById('newType').value;

    console.log(newType)
  }
</script>