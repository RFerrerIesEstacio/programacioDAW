<article class="panel is-primary" style="width: 60%;">
    <div class="panel-heading" style="text-align: center;">
                <p>
                    <?= getTraslationValue("LISTA_COMPRA") ?><br>
                    
                </p>
                
    </div>   
    <div class="box">
        <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable">
            <thead>
                <tr>
                    <th><?= getTraslationValue("NOMBRE") ?></th>
                    <th style="text-align: center;"><?= getTraslationValue("DESCRIPCION") ?></th>
                    <th style="text-align: center;"><?= getTraslationValue("PRECIO_UNIDAD") ?></th>
                    <th style="text-align: center;"><?= getTraslationValue("IMAGEN") ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $product = new Product();
                $productList = $product ->getAll();
                foreach($productList as $item){

                    print(
                        "<tr>
                            <td>{$item->getName()}</td>
                            <td style=\"text-align: center;\">{$item->getDescription()}</td>
                            <td style=\"text-align: center;\">{$item->getUnitPrice()}</td>
                            <td style=\"text-align:center; \"><img style=\" width: 100px;\" src=\"{$item->getImage()}\"</td>
                        "
                    );
                }
                ?>
            </tbody>
        </table>
    </div>
</article>