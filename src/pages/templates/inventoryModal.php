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
        <div class="row flex-center">
          <div class="form-div container">
            <div id="successDiv" class="p-3 mb-2 bg-success text-white d-none">Item cadastrado com sucesso!</div>
            <form class="form px-3" method="POST">
              <div class="form-group">
                <label>Tipo</label>
                <div class="d-flex">
                  <select required name="type" id="type" class="form-control">
                    <?php foreach ($types as $type) { ?>
                      <option value="<?= $type['id'] ?>"><?php echo $type['type_name'] ?></option>
                    <?php } ?>
                  </select>
                  <button type="button" onclick="showNewTypeForm()" class="btn btn-primary">+</button>
                </div>
                <div class="d-none" id="newTypeDiv">
                  <div class="d-flex g-2">
                    <label for="newType">Novo Tipo:</label>
                    <input type="text" name="newType" id="newType" class="">
                    <button type="button" onclick="createType()">Cadastrar tipo</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Cor</label>
                <div class="d-flex">
                  <select required name="color" id="color" class="form-control">
                    <?php foreach ($colors as $color) { ?>
                      <option value="<?= $color['id'] ?>"><?php echo $color['color'] ?></option>
                    <?php } ?>
                  </select>
                  <button type="button" onclick="showNewColorForm()" class="btn btn-primary">+</button>
                </div>
                <div class="d-none" id="newColorDiv">
                  <div class="d-flex g-2">
                    <label for="newColor">Nova Cor:</label>
                    <input type="text" name="newColor" id="newColor" class="">
                    <button type="button" onclick="createColor()">Cadastrar Cor</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Produto</label>
                <input type="text" name="product" id="product" required class="form-control" />
              </div>
              <div class="form-group">
                <label>Quantia em estoque</label>
                <input type="number" name="stock" id="stock" required class="form-control" />
              </div>
              <div class="modal-footer">
                <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" id="saveClothBtn" onclick="createStock()" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  function createStock() {
    $.ajax({
      type: "POST",
      url: "../actions/StockAction.php",
      data: {
        action: 'storeStock',
        stockItem: {
          'type_id': document.getElementById('type').value,
          'color_id': document.getElementById('color').value,
          'product': document.getElementById('product').value,
          'stock': document.getElementById('stock').value,
        },
      },
      success: function(response) {
        document.getElementById('closeBtn').click()
        showMainSucess()

        setTimeout(function() {
          location.reload();
        }, 1000);
      }
    });
  }

  function updateStock(id) {
    $.ajax({
      type: "POST",
      url: "../actions/StockAction.php",
      data: {
        action: 'updateStock',
        stockItem: {
          'id' : id,
          'type_id': document.getElementById('type').value,
          'color_id': document.getElementById('color').value,
          'product': document.getElementById('product').value,
          'stock': document.getElementById('stock').value,
        },
      },
      success: function(response) {
        document.getElementById('closeBtn').click()
        showMainSucess()

        setTimeout(function() {
          location.reload();
        }, 1000);
      }
    });
  }


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
    $.ajax({
      type: "POST",
      url: "../actions/TypesAction.php",
      data: {
        action: 'storeTypeAction',
        type: newType,
      },
      success: function(response) {
        var data = JSON.parse(response);
        updateSelect(data, 'type')

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
        action: 'storeColorAction',
        color: newColor,
      },
      success: function(response) {
        var data = JSON.parse(response);

        updateSelect(data, 'color')

        div = document.getElementById('newColorDiv')
        div.classList.add('d-none')
        showSucess();
      }
    });
  }

  function updateSelect(newOption, selectId) {
    select = document.getElementById(selectId)

    var newOptionSelect = document.createElement("option");
    newOptionSelect.value = newOption['id']; // Define o valor da opção como a chave do primeiro elemento do objeto
    newOptionSelect.text = selectId == 'color' ? newOption['color'] : newOption['type']; // Define o texto da opção como o valor do primeiro elemento do objeto
    select.add(newOptionSelect);
  }

  function showSucess() {
    var div = document.getElementById('successDiv');
    div.classList.remove('d-none');
  }

  function showMainSucess() {
    var div = document.getElementById('mainSuccessDiv');
    div.classList.remove('d-none');
  }

  function populateCloth(cloth) {
    document.getElementById('type').value = cloth.type_id
    document.getElementById('color').value = cloth.color_id
    document.getElementById('product').value = cloth.product
    document.getElementById('stock').value = cloth.stock

    var button = document.getElementById("saveClothBtn");

    button.removeAttribute("onclick");
    button.addEventListener("click", function() {
      updateStock(cloth.id)
    });
  }
</script>