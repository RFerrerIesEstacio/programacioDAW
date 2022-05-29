<?php include_once("view/headerCmp.php");
$user = getUserSession();
if ($user == null){
    header('Location: ' . constant('URL_BASE') . 'loginpage.php');
}
?>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <?php include_once("view/detailsuserCmp.php");?>
            </div>
            <div class="column is-three-quarters">
                <?php include_once("view/shoplistCmp.php");?>
            </div>
        </div>
    </div>
</section>
    
<?php 
    include_once("view/footerCmp.php");
    require_once("./modals.php");
?>
