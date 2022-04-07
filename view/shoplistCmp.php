<?php 
    
    include_once("model/shoplist.php");
    include_once("controller/shoppingListAdministration.php");

    $shoppingList = new ShoppingList();

    

    if ($user != null){
        $shoppingList = $shoppingList->getListByUserId($user->getId());
    }
    $shoplistElements = array();
    $shoplistElements[0] = new shopListElement(1, "Peras", 2, 1, "Alimentos");
    $shoplistElements[1] = new shopListElement(2, "Uvas", 3, 2, "Alimentos");
    $shoplistElements[2] = new shopListElement(3, "Cerezas", 1, 1.5, "Alimentos");

    $shopingListName = "Lista de la Compra";


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
                        <th>Cantidad</th>
                        <th>Tipo</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach($shoplistElements as $shoppingItem){
                        $productTotal = $shoppingItem->getQuantity() * $shoppingItem->getPrice();
                        $total += $productTotal;
                        print("<tr><td>{$shoppingItem->getName()}</td><td>{$shoppingItem->getQuantity()}</td><td>{$shoppingItem->getType()}</td><td>$productTotal</td></tr>");
                    }
                    print("<tfoot><th colspan=\"3\">TOTAL</th><th>$total</th></tfoot>");
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



