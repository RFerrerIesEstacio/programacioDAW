<?php

if (isset($_GET['item'])){

}
$botton = "Crear";
$accion = "Create";
if($shoppingList -> getUserId() != -1){
    $botton = "Modificar";
    $accion = "Update";
}
?>
<div id="deleteModal" class="shadow hidden">
    <div class="modal-contentt">
        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
           Borrar Lista de la Compra
        </p>
        <div class="box" style="margin: 0;">
            <p style="text-align: center;">
                ¿Desea eliminar la lista de la compra <b><?= $shoppingList -> getName() ?></b>?
            </p>
            <br>
            <form action="" method="POST">
                <div class="buttons is-centered" style="padding: 10px;">
                        <input id="prodId" name="shoppingListId" type="hidden" value=" <?= $shoppingList->getId(); ?> ">
                        <input id="action" name="action" type="hidden" value="Delete">
                        <button class="button is-primary" type="submit">Aceptar</button>
                    
                    <a class="button is-link is-light shut" >Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="updateModal" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
            Registro de lista de la compra para el usuario <?= $user -> getName(); ?>
        </p>
        <div class="box" style="margin: 0;">
            <form action="" method="POST">
                <div class="field">
                    <label class="label">Nombre de la lista</label>
                    <input class="input" type="text" name="name" placeholder="Nombre" value="<?= $shoppingList->getName(); ?>">
                </div>
                <div class="field">
                    <label class="label">Descripción</label>
                    <input class="input" type="text" name="description" placeholder="Descripción" value="<?= $shoppingList->getDescription(); ?>">
                </div>
                <div class="field">
                    <label class="label">Image</label>
                    <input class="input" type="text" name="image" placeholder="Image" value="<?= $shoppingList->getImage(); ?>">
                    <input id="prodId" name="shoppingListId" type="hidden" value=" <?= $shoppingList->getId(); ?> ">
                    <input id="action" name="action" type="hidden" value=<?=$accion?>>
                </div> 
                <br>
                <div class="buttons is-centered">
                    <button class="button is-primary" type="submit"><?=$botton?></button>
                    <a class="button is-link is-light shut" style="color: black;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="deleteProduct" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
           Borrar Producto
        </p>
        <div class="box" style="margin: 0;">
            <p id ="productChange" style="text-align: center;">
                ¿Desea eliminar el producto <b><?=$_GET['item']?></b> de su lista de la compra?
            </p>
        
            <form action="" method="POST">
                <div class="buttons is-centered" style="padding: 10px;">
                        <input id="productName" name="shoppingListName" type="hidden">
                        <input id="action" name="action" type="hidden" value="deleteProduct">
                        <button class="button is-primary" type="submit">Aceptar</button>
                    
                    <a class="button is-link is-light shut">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="addProduct" class="shadow hidden">
    <div class="modal-contentt">

        <span class="close">&times;</span>
        <p class="panel-heading" style="text-align: center; padding-right: 7px; background-color:#00d1b2; color:white;">
           Añadir Producto
        </p>
        <div class="box" style="margin: 0;">
            <p style="margin:5px; text-align:center" id ="productChange" style="text-align: center;">
                Seleccione el producto que desea añadir
            </p>
            <br>
            <form action="" method="POST">
            <div style="text-align: center; margin: 10px;">       
                <label for="products">Producto:</label>
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
                <label for="productQuantity">Cantidad:</label>
                <input name="productQuantity" type="number" value="">
            </div>
            <br>
            <div class="buttons is-centered" style="padding: 10px;">
                    <input id="shoppingListId" name="shoppingListId" type="hidden" value="">
                    <input id="action" name="action" type="hidden" value="addProduct">
                    <button class="button is-primary" type="submit">Aceptar</button>
                
                <a class="button is-link is-light shut">Cancelar</a>
            </div>
        </form>
        </div>
        
    </div>
</div>
<script src="styles/modal.js"></script>