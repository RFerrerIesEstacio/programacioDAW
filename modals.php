<?php

if (isset($_GET['item'])){

}
if (isset($shoppingList)){
    $botton = getTraslationValue("ACCEPT") ;
    $accion = "Create";
    if($shoppingList -> getUserId() != -1){
        $botton = getTraslationValue("MODIFY");
        $accion = "Update";
    }
}

?>

<?php if(isset($shoppingList)): ?>
<!--  MODAL PARA ELIMINAR LISTAS  -->
<div id="deleteModal" class="shadow hidden">
    <div class="modal-contentt">
        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
            <?= getTraslationValue("DEL_LIST") ?>
        </p>
        <div class="box" style="margin: 0;">
            <p style="text-align: center;">
                ¿ <?= getTraslationValue("DESEA_ELIMINAR") ?><b><?= $shoppingList -> getName() ?></b>?
            </p>
            <br>
            <form action="" method="POST">
                <div class="buttons is-centered" style="padding: 10px;">
                        <input id="prodId" name="shoppingListId" type="hidden" value=" <?= $shoppingList->getId(); ?> ">
                        <input id="action" name="action" type="hidden" value="Delete">
                        <button class="button is-primary" type="submit"><?= getTraslationValue("ACCEPT") ?></button>
                    
                    <a class="button is-link is-light shut" ><?= getTraslationValue("CANCEL") ?></a>
                </div>
            </form>
        </div>
    </div>
</div>





<!--  MODAL PARA MODIFICAR/CREAR LISTAS  -->

<div id="updateModal" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
            <?= getTraslationValue("LIST_REGISTER") ?> <?= $user -> getName(); ?>
        </p>
        <div class="box" style="margin: 0;">
            <form action="" method="POST">
                <div class="field">
                    <label class="label"><?= getTraslationValue("LIST_NAME") ?></label>
                    <input class="input" type="text" name="name" placeholder="Nombre" value="<?= $shoppingList->getName(); ?>">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("DESCRIPCION") ?></label>
                    <input class="input" type="text" name="description" placeholder="Descripción" value="<?= $shoppingList->getDescription(); ?>">
                </div>
                <div class="field">
                    <label class="label"><?= getTraslationValue("IMAGE") ?></label>
                    <input class="input" type="text" name="image" placeholder="Image" value="<?= $shoppingList->getImage(); ?>">
                    <input id="prodId" name="shoppingListId" type="hidden" value=" <?= $shoppingList->getId(); ?> ">
                    <input id="action" name="action" type="hidden" value=<?=$accion?>>
                </div> 
                <br>
                <div class="buttons is-centered">
                    <button class="button is-primary" type="submit"><?=$botton?></button>
                    <a class="button is-link is-light shut" style="color: black;"><?= getTraslationValue("CANCEL") ?></a>
                </div>
            </form>
        </div>
    </div>
</div>



<!--  MODAL PARA ELIMINAR PRODUCTOS  -->

<div id="deleteProduct" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
           Borrar Producto
        </p>
        <div class="box" style="margin: 0;">
            <p id ="productChange" style="text-align: center;">
                ¿<?= getTraslationValue("ARE_U_SURE") ?> <b><?=$_GET['item']?></b> <?= getTraslationValue("DE_LISTA") ?>?
            </p>
        
            <form action="" method="POST">
                <div class="buttons is-centered" style="padding: 10px;">
                        <input id="productName" name="productName" type="hidden">
                        <input id="action" name="action" type="hidden" value="deleteProduct">
                        <button class="button is-primary" type="submit"><?= getTraslationValue("ACCEPT") ?></button>
                    
                    <a class="button is-link is-light shut"><?= getTraslationValue("CANCEL") ?></a>
                </div>
            </form>
        </div>
    </div>
</div>







<!--  MODAL PARA AÑADIR PRODUCTOS  -->

<div id="addProduct" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
            <?= getTraslationValue("ADD_PRODUCT") ?>
        </p>
        <div class="box" style="margin: 0;">
            <p style="margin:5px; text-align:center" id ="productChange" style="text-align: center;">
                <?= getTraslationValue("SELECT_PRODUCT_ADD") ?> 
            </p>
            <br>
            <form action="" method="POST">
            <div style="text-align: center; margin: 10px;">       
                <label for="products"><?= getTraslationValue("PRODUCT") ?>:</label>
                <select name="selectedProduct" id="selectedProduct">
                    <?php 
                    $product = new Product();
                    $productList = $product->getAll();
                    
                    foreach ($productList as $product){
                        if($product->checkProductOnList($shoppingList->getId())){
                            $selProductId = $product->getId();
                            $selProductName = $product->getName();
                            $selProductDescription = $product->getDescription(); 
                    ?>
                        <option value="<?= $selProductId?>" tittle="<?=$selProductDescription?>"><?=$selProductName?></option>

                <?php }
                }?>
                </select>
            </div>
            <div style=" text-align: center; margin: 10px">
                <label for="productQuantity"><?= getTraslationValue("CANTIDAD") ?>:</label>
                <input name="productQuantity" type="number" value="">
            </div>
            <br>
            <div class="buttons is-centered" style="padding: 10px;">
                    <input id="shoppingListId" name="shoppingListId" type="hidden" value="">
                    <input id="action" name="action" type="hidden" value="addProduct">
                    <button class="button is-primary" type="submit"><?= getTraslationValue("ACCEPT") ?></button>
                
                <a class="button is-link is-light shut"><?= getTraslationValue("CANCEL") ?></a>
            </div>
        </form>
        </div>
        
    </div>
</div>





<?php endif ?>

<!--  MODAL PARA LOS SETTINGS -->

<div id="settingsModal" class="shadow hidden">
    <div class="modal-contentt">
        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
            <?= getTraslationValue("SETTINGS") ?>
        </p>
        <div class="box" style="margin: 0;">
            <div class="tabs is-boxed" style="margin-bottom: 0;">
                <ul>
                    <li class="is-active" data-target="user-tab"><a><?= getTraslationValue("USUARIO") ?></a></li>
                    <li data-target="language-tab"><a><?= getTraslationValue("IDIOMA") ?></a></li>
                    <li data-target="session-tab"><a><?= getTraslationValue("CERRAR_SESION") ?></a></li>
                </ul>
            </div>
        
            <div class="px-2" id="tab-content" style="border-right: solid #e7e7e7 1px; border-left: solid #e7e7e7 1px; border-bottom: solid #e7e7e7 1px; border-top: solid #e7e7e7 0px;">
                <div id="user-tab">

                <h3 class="is-size-5 tittle" style="text-align:center; padding: 10px;"><b><?= getTraslationValue("INFORMACION_USUARIO") ?></b></h3>

                    <div style="margin-left: 10px;">
                        <h5><b><?= getTraslationValue("NOMBRE") ?>: </b> <?= $user->getName() ?></h3>
                        <h5><b><?= getTraslationValue("USERNAME") ?>: </b> <?= $user->getUsername() ?></h3>
                        <h5><b><?= getTraslationValue("EMAIL") ?>: </b> <?= $user->getEmail() ?></h3>
                        <h5><b><?= getTraslationValue("DIRECCION") ?>: </b> <?= $user->getAdress() ?></h3>
                        <div class="buttons is-centered" style="padding: 20px;">
                            <button class="button is-primary" onclick="window.location.href = './userEditPage.php'"><?= getTraslationValue("MODIFY") ?></button>
                        </div>
                    </div>

                </div>
                <div id="language-tab" class="is-hidden" style="text-align:center;">
                    <h3 class="is-size-5 tittle" style="text-align:center; padding: 10px;"><b><?= getTraslationValue("IDIOMA") ?></b></h3>
                    
                        <form method="POST" action="">
                            <div style="text-align: center; margin-bottom: 10px;">
                                <label for="language">
                                    <?= getTraslationValue("SELECT_IDIOMA") ?>:
                                </label>
                                <select id="selectedLanguage" name="language">
                                    <option value="en" <?= getLanguageSesion() == 'en' ? 'selected' : '' ?> title="Inglés"><?= getTraslationValue("IN") ?></option>
                                    <option value="es" <?= getLanguageSesion() == 'es' ? 'selected' : '' ?> title="Español"><?= getTraslationValue("ES") ?></option>
                                    <option value="it" <?= getLanguageSesion() == 'it' ? 'selected' : '' ?> title="Italiano"><?= getTraslationValue("IT") ?></option>
                                </select>
                            </div>
                            <div class="buttons is-centered" style="padding: 20px;">
                                <button class="button is-primary" type="submit"><?= getTraslationValue("APPLY") ?></button>
                                <a class="button is-link is-light" onclick="window.location.href ='./index.php'"><?= getTraslationValue("CANCEL") ?></a>
                            </div>
                        </form>

                </div>
                <div id="session-tab" class="is-hidden" style="text-align:center; padding: 10px;">
                    <h3 class="is-size-5 tittle"><b><?= getTraslationValue("CERRAR_SESION") ?></b></h3>
                    <br>
                    <p>¿ <?= getTraslationValue("SURE_CERRAR_SESION") ?> <?= $user->getName() ?> ? </p>
                    <br>

                    <form method="POST" action="">
                            <button class="button is-danger" type="submit" name="logout"><?= getTraslationValue("CERRAR_SESION") ?></button>
                    </form>
                        
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CAMBIAR CANTIDAD DE PRODUCTOS !-->

<div id="editProduct" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
            Editar Producto
        </p>
        <div class="box" style="margin: 0;">
            <p style="margin:5px; text-align:center" id ="editChange" style="text-align: center;">
                
            </p>
            <br>
            <form action="" method="POST">
            <div style=" text-align: center; margin: 10px">
                <label for="productQuantity"><?= getTraslationValue("CANTIDAD") ?>:</label>
                <input id="productCant" name="productQuantity" type="number" value="">
            </div>
            <br>
            <div class="buttons is-centered" style="padding: 10px;">
                    <input id="productNameChange" name="productNameChange" type="hidden">
                    <input id="action" name="action" type="hidden" value="editProduct">
                    <button class="button is-primary" type="submit"><?= getTraslationValue("ACCEPT") ?></button>
                
                <a class="button is-link is-light shut"><?= getTraslationValue("CANCEL") ?></a>
            </div>
        </form>
        </div>
        
    </div>
</div>

<script src="styles/modal.js"></script>
<script src="javascript/settings.js"></script>