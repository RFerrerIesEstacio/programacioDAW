<?php
     
$user = getUserSession();
$userSession = True;
if ($user == null){
    $userSession = False;
    $user = new User();
}

?>
<article class="panel is-primary">
    <p class="panel-heading">
     <?= getTraslationValue("INFORMACION_USUARIO") ?>
    </p>    
    <div class="box">
        <div>
            <h3><b><?= getTraslationValue("NOMBRE") ?>:</b> <?= $user->getName() ?></h3>
            <h3><b><?= getTraslationValue("USERNAME") ?>: </b> <?= $user->getUsername() ?></h3>
            <h3><b><?= getTraslationValue("EMAIL") ?>: </b> <?= $user->getEmail() ?></h3>
            <h3><b><?= getTraslationValue("DIRECCION") ?>: </b> <?= $user->getAdress() ?></h3>
            <br>  
            <div style="display: flex; justify-content: center;"><img src=<?= $user->getImage() != "" ? $user ->getImage() : "view/images/User_images/user.png"?> width="200" height="200"></div>
        </div>
    <?php if($userSession): ?>
        <div style="text-align: right;">
            <button class="button is-rounded" title="Editar" onclick="window.location.href = './userEditPage.php'"><img src="view/images/edit.jpg" style="height: 35px;"></button>
        </div>
    <?php endif; ?>
    </div>
</article>