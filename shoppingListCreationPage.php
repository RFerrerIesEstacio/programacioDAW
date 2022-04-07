<?php 

include_once("view/headerCmp.php");
include_once("controller/shoppingListAdministration.php");
$user = getUserSession();

if ($user == null){
    header( 'Location : ' . constant('URL_BASE') . 'loginpage.php');
}
$shoppingList = new ShoppingList();
$shoppingList = $shoppingList->getListByUserId($user->getId());
$action = $_GET['action'];
$botton = "Crear";
if($shoppingList -> getUserId() != -1){
    $botton = "Modificar";
}
?>
    <div class="columns is-vcentered is-centered" style="height:90vh; justify-content:center">
        <article class="panel is-primary" style="width:400px">
        <p class="panel-heading" style="text-align: center;">
            Registro de lista de la compra para el usuario <?= $user -> getName(); ?>
        </p>
        <div class="box">
            <form action="" method="POST">
                <div class="field">
                    <label class="label">Nombre de la lista</label>
                    <input class="input" type="text" name="name" placeholder="Nombre" value=" <?= $shoppingList->getName(); ?> ">
                </div>
                <div class="field">
                    <label class="label">Descripción</label>
                    <input class="input" type="text" name="description" placeholder="Descripción" value=" <?= $shoppingList->getDescription(); ?> ">
                </div>
                <input id="prodId" name="shoppingListId" type="hidden" value=" <?= $shoppingList->getId(); ?> ">
                <div class="buttons is-centered">
                    <button class="button is-primary" type="submit"><?= $botton ?></button>
                    <a class="button is-link is-light" style="color: black;" onclick="window.location.href = './index.php'">Cancelar</a>
                </div>
            </form>
        </div>
        </article>

    </div>


<?php
include_once("view/footerCmp.php");
?>
