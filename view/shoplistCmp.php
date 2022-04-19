<?php 
    
    include_once("model/shoplist.php");
    include_once("controller/shoppingListAdministration.php");

    $shoppingList = new ShoppingList();

    

    if ($user != null){
        $shoppingList = $shoppingList->getListByUserId($user->getId());
    }

?>

<article class="panel is-primary">

    <?php if($shoppingList -> getId() != -1): ?>
        <div class="panel-heading" style="text-align: center;">
            <p>
                Lista de la compra -> <i><?= $shoppingList -> getName(); ?></i><br>
                <?= $shoppingList -> getDescription(); ?>
            </p>
            <img src="<?=$shoppingList->getImage()?>" style="width: 80px;"> 
            <div style="display: flex; flex-direction: row; justify-content: flex-end">
                <button class="button is-rounded" title="Editar" onclick="loadModal('#updateModal')"><img src="view/images/edit.jpg" style="width: 30px;"></button>
                <button id="deleteBtn" class="button is-rounded" onclick="loadModal('#deleteModal')"><img src="view/images/delete.png" style="width: 30px;"></button>
            </div> 
        </div>   
        <div class="box">
            <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th style="text-align: center;">Cantidad</th>
                        <th style="text-align: center;">Precio Unidad</th>
                        <th style="text-align: center;">Tipo</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $shoppingListElements = array();
                    $shoppingElement = new shopListElement();
                    $shoppingListElements = $shoppingElement->getShoppingItemsList($shoppingList->getId());
                    $total = 0;
                    foreach($shoppingListElements as $shoppingItem){
                        $productTotal = $shoppingItem->getQuantity() * $shoppingItem->getPrice();
                        $total += $productTotal;
                        print("<tr>
                                    <td>{$shoppingItem->getName()}</td>
                                    <td style=\"text-align: center;\">{$shoppingItem->getQuantity()}</td>
                                    <td style=\"text-align: center;\">{$shoppingItem->getPrice()}</td>
                                    <td style=\"text-align: center;\">{$shoppingItem->getType()}</td>
                                    <td style=\"text-align: center;\">$productTotal</td>
                                    <td id={$shoppingItem->getIdProduct()} style=\"text-align: center;\">
                                        <button class=\"button\" onclick=\"loadModal('#deleteProduct', '{$shoppingItem->getName()}')\"><img src=\"view/images/delete.png\" style=\"width: 30px;\"></button>
                                    </td>
                                </tr>
                            ");
                    }
                    print("<tfoot><th colspan=\"4\">TOTAL</th><th style=\"text-align: center;\">$total</th></tfoot>");
                    ?>
                </tbody>
        </div>
    <?php else: ?>
        <div class="notification is-primary" style="text-align: center;">
            <p style="margin-bottom: 10px;">El usuario no dispone de una lista de la compra</p>
            <button class="button is-rounded" tittle="Crear" onclick="loadModal('#updateModal')">Añadir</button>
        </div>
    <?php endif; ?>
</article>
<?php 
require_once("./modals.php");
 ?>



