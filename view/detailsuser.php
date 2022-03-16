<?php

    include_once("model/user.php");
    $user = new User(1,"Usuario1","email@email.com","view/images/logo.png");


?>
<article class="panel is-primary">
    <p class="panel-heading">
    Información del Usuario
    </p>    
    <div class="box">
        <div>
            <h2><?= $user->getName() ?></h2>
            <h3><?= $user->getEmail() ?></h3>
            <div style="align-items: center;"><img src=<?= $user ->getImage() ?> width="200" height="200"></div>
        </div>
    </div>
</article>