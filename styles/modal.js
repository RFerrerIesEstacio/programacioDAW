
function loadModal(type, name){
  $(type).removeClass("hidden");

  if(name){
    $('#productChange').text('¿Desea eliminar el producto ' + name + ' de su lista de la compra?');
    $('input#productName').attr('value', name);
  }

}
$(".close").on("click", function() {
  $(this).parent().parent().addClass("hidden");
});

$(".shut").on("click", function() {
  $(this).parent().closest('.shadow').addClass("hidden");
});




