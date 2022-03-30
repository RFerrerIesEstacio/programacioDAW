<?php 

include_once("view/headerCmp.php");
include_once("controller\userRegistration.php"); 

?>

<div class="columns is-vcentered is-center" style="height:90vh; justify-content:center">
<article class="panel is-primary" style="width:400px">
    <p class="panel-heading" style="text-align: center;">
        Registro de usuario
    </p>
    <div class="box">
        <form action="" method="POST">
            <div class="field">
                <label class="label">Nombre y apellidos</label>
                <input class="input" type="text" name="name" placeholder="Nombre y apellidos">
            </div>
            <div class="field">
                <label class="label">Nombre de usuario</label>
                <input class="input" type="text" name="username" placeholder="Nombre de usuario">
            </div>
            <div class="field">
                <label class="label">Correo Electrónico</label>
                <input class="input" type="email" name="email" placeholder="Correo Electrónico">
            </div>
            <div class="field">
                <label class="label">Dirección</label>
                <input class="input" type="text" name="adress" placeholder="Dirección">
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <input class="input" type="password" name="password" placeholder="Password">
            </div>
            <div class="buttons is-centered">
                <button class="button is-primary" type="submit">Registrar</button>
                <a class="button is-link is-light" style="color: black;" onclick="window.location.href = './index.php'">Cancelar</a>
            </div>

            <div>
                <small><em>¿Ya tienes una cuenta?, <a href="./loginpage.php">Inicia Sesion</a></em></small>
            </div>
        </form>
    </div>
</article>

</div>

<?php
include_once("view/footerCmp.php");
?>
