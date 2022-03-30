<?php

if (!empty($_POST)){
    
    if (!empty($_POST['username']) && !empty($_POST['password'])){
          
        $usernameUsuario = $_POST['username'];
        $passwordUsuario = $_POST['password'];

        $user = new User ();
        $user = $user->getByUsername($usernameUsuario);


        if ($user != null){
            if (password_verify($passwordUsuario, $user->getPassword())){   
                setUserSession($user);
                header('Location: '. constant('URL_BASE'));
            }
        }
        $_POST = array();
    }
}
?>