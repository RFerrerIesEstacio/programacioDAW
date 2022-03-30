<?php

if (!empty($_POST)){
    if (!empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['adress']) && !empty($_POST['email'])){
          
        $nombreUsuario = $_POST['name'];
        $usernameUsuario = $_POST['username'];
        $passwordUsuario = $_POST['password'];
        $hashed_password = password_hash($passwordUsuario, PASSWORD_DEFAULT);
        $direccionUsuario = $_POST['adress'];
        $emailUsuario = $_POST['email'];
        $user = new User ($nombreUsuario, $emailUsuario, "", $usernameUsuario, $direccionUsuario, $hashed_password);
        $isUserCreated = $user->create();
        if ($isUserCreated){
            setUserSession($user);
            header('Location: ' . constant('URL_BASE'));
        }
        $_POST = array();
    }
}
?>