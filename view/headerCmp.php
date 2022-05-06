<?php
require_once('config/config.php');
require_once('model/shoppingList.php');
require_once('model/product.php');
include_once("config/log.php");
require_once('model/user.php'); 
require_once('controller/database.php'); 
require_once('controller/session.php');
require_once('model/shoplist.php');

startSession();

require_once("controller/settings.php"); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaCompra</title>
    <link rel="stylesheet" href="./styles/bulma.min.css">
    <link rel="stylesheet" href="./styles/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>


    <nav class="navbar" role="navigation" aria-label="main navigation" style="height: 90px; background-color: #dfffed;">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <img src="./view/images/logo1.png" style="max-height: 90px;">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>

                <a class="navbar-item">
                    Documentation
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <?php $userSession = getUserSession();
                if($userSession == null): ?>
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" onclick="window.location.href = './userRegistrationPage.php'">
                                <strong>Sign up</strong>
                            </a>
                            <a class="button is-light" onclick="window.location.href = './loginpage.php'">
                                Log in
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="navbar-item">

                        <p style="padding: 20px; color: #d34141;"><?= $userSession -> getUsername();?></p>
                        <button class="button" tittle="Ajustes" onclick="loadModal('#settingsModal')">⚙️</button>

                        <?php if(isset($_POST['logout'])){ 
                                closeSession();
                                $_POST = array();
                                header('Location: ' . constant('URL_BASE') . 'loginpage.php');
                                }
                        ?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </nav>