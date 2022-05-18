<?php 

include_once("view/headerCmp.php");

?>
<div class="columns is-vcentered is-centered" style="height:60vh; justify-content:center; flex-direction:column;">
    <?php 
    include_once("view/productListCmp.php");
    ?>
     <button class="button is-primary" onclick="window.location.href = './index.php'" >Inicio</button>
</div>


<?php
include_once("view/footerCmp.php");
?>