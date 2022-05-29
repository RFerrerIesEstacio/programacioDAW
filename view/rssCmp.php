<article class="panel is-primary" style="width: 80%;">
    <div class="panel-heading" style="text-align: center;">
        <?php if($_GET['opcion'] == 'noticias'): ?>
            <p>Noticias<br></p>
        <?php elseif($_GET['opcion'] == 'recetas'):?>
            <p>Recetas<br></p>
        <?php endif?>
    </div> 
    
        <?php if($_GET['opcion'] == 'recetas'):?>
            <div class="box">
                <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Titulo</th>
                            <th style="text-align: center;">Descripcion</th>
                            <th style="text-align: center;">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $rss = new DOMDocument();
                        $rss ->load('https://gastronomiaycia.republica.com/category/hoy-cocinas-tu/feed/');
                        $list = array();
                        foreach($rss->getElementsByTagName('item') as $node){
                            $item = array(
                                'title' => $node->getElementsByTagName('title') ->item(0)->nodeValue,
                                'descript' => $node->getElementsByTagName('description') ->item(0)->nodeValue,
                                'link' => $node->getElementsByTagName('link') ->item(0)->nodeValue
                            );
                            array_push($list,$item);
                        }

                        foreach($list as $item){

                            print(
                                "<tr>
                                    <td>{$item['title']}</td>
                                    <td style=\"text-align: center;\">{$item['descript']}</td>
                                    <td style=\"text-align: center;vertical-align: middle;\"><a class=\"button is-primary\" href=\"{$item['link']}\">Link<a></td>
                                "
                            );
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php elseif($_GET['opcion'] == 'noticias'):?>
            <div class="box">
                <table class="table is-fullwidth is-bordered is-striped is-narrow is-hoverable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Titulo</th>
                            <th style="text-align: center;">Descripcion</th>
                            <th style="text-align: center;">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $rss = new DOMDocument();
                        $rss ->load('http://ep01.epimg.net/rss/elpais/blogs.xml');
                        $list = array();
                        foreach($rss->getElementsByTagName('item') as $node){
                            $item = array(
                                'title' => $node->getElementsByTagName('title') ->item(0)->nodeValue,
                                'descript' => $node->getElementsByTagName('description') ->item(0)->nodeValue,
                                'link' => $node->getElementsByTagName('link') ->item(0)->nodeValue
                            );
                            array_push($list,$item);
                        }

                        foreach($list as $item){

                            print(
                                "<tr>
                                    <td>{$item['title']}</td>
                                    <td style=\"text-align: center;\">{$item['descript']}</td>
                                    <td style=\"text-align: center;vertical-align: middle;\"><a class=\"button is-primary\" href=\"{$item['link']}\">Link<a></td>
                                "
                            );
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php endif?>
</article>