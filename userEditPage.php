<?php
include_once("view/headerCmp.php");
include_once("controller/userUpdate.php");
$user = getUserSession();
if($user == null){
    $user = new User();
}
?>

<div class="columns is-vcentered is-center" style="height:90vh; justify-content:center">
<article class="panel is-primary" style="width:400px">
    <p class="panel-heading" style="text-align: center;">
        Modificación de datos de Usuario
    </p>
    <div class="box">
        <form action="" method="POST">
            <div class="field">
                <label class="label">Nombre y apellidos</label>
                <input class="input" type="text" name="name" value="<?= $user->getName() ?>">
            </div>
            <div class="field">
                <label class="label">Nombre de usuario</label>
                <input class="input" type="text" name="username" value="<?= $user->getUsername() ?>">
            </div>
            <div class="field">
                <label class="label">Correo Electrónico</label>
                <input class="input" type="email" name="email" value="<?= $user->getEmail() ?>">
            </div>
            <div class="field">
                <label class="label">Dirección</label>
                <input class="input" type="text" name="adress" value="<?= $user->getAdress() ?>">
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <input class="input" type="password" name="password">
                <p class="help">* Introducir uno si se desea modificar el existente. Dejar en blanco en caso contrario</p>
            </div>
            <div class="buttons is-centered">
                <button class="button is-primary" type="submit">Modificar</button>
                <a class="button is-link is-light" style="color: black;" onclick="window.location.href = './index.php'">Cancelar</a>
            </div>
    </div>
</article>

</div>

<?php

   
include_once("view/footerCmp.php");

?>