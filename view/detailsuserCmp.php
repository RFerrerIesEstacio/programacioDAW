<?php

    include_once("model/user.php");
    $user = new User();
    $user = $user->getByName("Rafa");


?>
<article class="panel is-primary">
    <p class="panel-heading">
    Información del Usuario
    </p>    
    <div class="box">
        <div>
            <h3><b>Nombre: </b> <?= $user->getName() ?></h3>
            <h3><b>Nombre de usuario: </b> <?= $user->getUsername() ?></h3>
            <h3><b>Email: </b> <?= $user->getEmail() ?></h3>
            <h3><b>Dirección: </b> <?= $user->getAdress() ?></h3>
            
            <div style="align-items: center;"><img src=<?= $user ->getImage() ?> width="200" height="200"></div>
        </div>
    </div>
</article>