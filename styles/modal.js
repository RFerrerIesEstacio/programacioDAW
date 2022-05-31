
function loadModal(type, name, cantidad){
  $(type).removeClass("hidden");

  if(name && type == "#deleteProduct"){
    $('#productChange').text('¿Desea eliminar el producto ' + name + ' de su lista de la compra?');
    $('input#productName').attr('value', name);
  }

  if(name && type == "#addProduct"){
    $('input#shoppingListId').attr('value', name);
  }

  if(cantidad && name && type == "#editProduct"){
    $('#editChange').text('¿Desea cambiar la cantidad del producto ' + name + ' de su lista de la compra?');
    $('input#productNameChange').attr('value', name);
    $('input#productCant').attr('value', cantidad);
  }

}
$(".close").on("click", function() {
  $(this).parent().parent().addClass("hidden");
});

$(".shut").on("click", function() {
  $(this).parent().closest('.shadow').addClass("hidden");
});


