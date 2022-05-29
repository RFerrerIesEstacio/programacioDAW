<?php 

include_once("view/headerCmp.php");
$user = getUserSession();
if ($user == null){
    header('Location: ' . constant('URL_BASE') . 'loginpage.php');
}

?>
<div class="columns is-vcentered is-centered" style="justify-content:center; flex-direction:column; padding-top: 30px;padding-bottom: 100px;">
    <?php 
    include_once("view/rssCmp.php");
    ?>
     <button class="button is-primary" onclick="window.location.href = './index.php'" >Inicio</button>
</div>


<?php
include_once("view/footerCmp.php");
require_once("./modals.php");
?>