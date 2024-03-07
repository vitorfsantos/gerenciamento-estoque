<div class="row flex-center">
  <div class="form-div container">
    <div id="successDiv" class="p-3 mb-2 bg-success text-white d-none">Item cadastrado com sucesso!</div>
    <form class="form px-3" action="../../pages/user/create.php" method="POST">
      <div class="form-group">
        <label>Tipo</label>
        <div class="d-flex">
          <select name="type" id="type" class="form-control">
            <?php foreach ($types as $type) { ?>
              <option value="<?= $type['id'] ?>"><?php echo $type['type_name'] ?></option>
            <?php } ?>
          </select>
          <button type="button" onclick="showNewTypeForm()" class="btn btn-primary">+</button>
        </div>
        <div class="d-none" id="newTypeDiv">
          <form id="newTypeForm">
            <div class="d-flex g-2">
              <label for="newType">Novo Tipo:</label>
              <input type="text" name="newType" id="newType" class="">
              <button type="button" onclick="createType()">Cadastrar tipo</button>
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
          <button type="button" onclick="showNewColorForm()" class="btn btn-primary">+</button>
        </div>
        <div class="d-none" id="newColorDiv">
          <form id="newTypeForm">
            <div class="d-flex g-2">
              <label for="newColor">Nova Cor:</label>
              <input type="text" name="newColor" id="newColor" class="">
              <button type="button" onclick="createColor()">Cadastrar Cor</button>
            </div>
          </form>
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
  function showNewTypeForm() {
    div = document.getElementById('newTypeDiv')
    div.classList.remove('d-none')
  }

  function showNewColorForm() {
    div = document.getElementById('newColorDiv')
    div.classList.remove('d-none')
  }

  function createType() {
    newType = document.getElementById('newType').value;
    // console.log(newType)
    $.ajax({
      type: "POST",
      url: "../actions/TypesAction.php",
      data: {
        type: newType,
      },
      success: function(response) {
        console.log(response);
        div = document.getElementById('newTypeDiv')
        div.classList.add('d-none')
        showSucess();
      }
    });
  }

  function createColor() {
    newColor = document.getElementById('newColor').value;

    $.ajax({
      type: "POST",
      url: "../actions/ColorsAction.php",
      data: {
        color: newColor,
      },
      success: function(response) {
        var data = JSON.parse(response);
        console.log(data);
        updateSelect(data, 'color')

        div = document.getElementById('newColorDiv')
        div.classList.add('d-none')
        showSucess();
      }
    });
  }

  function updateSelect(newOption, selectId) {
    select = document.getElementById(selectId)
    console.log(select)

    var newOptionSelect = document.createElement("option");
    newOptionSelect.value = newOption['id']; // Define o valor da opção como a chave do primeiro elemento do objeto
    newOptionSelect.text = newOption['color']; // Define o texto da opção como o valor do primeiro elemento do objeto
    select.add(newOptionSelect);
  }

  function showSucess() {
    var div = document.getElementById('successDiv');
    div.classList.remove('d-none');
  }
</script>