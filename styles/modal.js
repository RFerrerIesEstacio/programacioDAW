
function loadModal(type){
  $(type).removeClass("hidden");

  
  
}
$(".close").on("click", function() {
  $(this).parent().parent().addClass("hidden");
});

$(".shut").on("click", function() {
  $(this).parent().closest('.shadow').addClass("hidden");
});

