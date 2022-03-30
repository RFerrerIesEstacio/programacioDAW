<?php include_once("view/headerCmp.php");?>

<div class="columns is-vcentered is-center" style="height:90vh; justify-content:center">

<article class="panel is-primary" style="width:400px">
    <p class="panel-heading" style="text-align: center;">
        Inicio de Sesion
    </p>
    <div class="box">
        <form action="" method="POST">
            <div class="field">
                <div class="control">
                    <input class="input" type="text" name="username" placeholder="Nombre de usuario">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="Contraseña">
                </div>
            </div>
        
            <div class="buttons is-centered">
                <button class="button is-primary">Acceder</button>
            </div>

            <div>
                <small><em>¿No dispones de una cuenta ya?, <a href="./userRegistrationPage.php">Regístrate</a></em></small>
            </div>
        </form>
    </div>
</article>

</div>

<?php include_once("controller\userLogin.php"); ?>
    
<?php include_once("view/footerCmp.php");?>
