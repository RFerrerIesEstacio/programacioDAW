<?php 
    include_once("model/shoplist.php");
    $shoplistElements = array();
    $shoplistElements[0] = new shopListElement(1, "Peras", 2, 1, "Alimentos");
    $shoplistElements[1] = new shopListElement(2, "Uvas", 3, 2, "Alimentos");
    $shoplistElements[2] = new shopListElement(3, "Cerezas", 1, 1.5, "Alimentos");

    $shopingListName = "Lista de la Compra";

?>

<article class="panel is-primary">
    <p class="panel-heading">
    Lista -> <i><?= $shopingListName ?></i>
    </p>    
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
</article>