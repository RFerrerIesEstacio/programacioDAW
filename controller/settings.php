<?php

$languageSession = getLanguageSesion();
if (!empty($_POST['language'])){
    $selectedLanguage = $_POST['language'];
    if($languageSession !== $selectedLanguage ){
        setLanguageSession($selectedLanguage);
    }
    /* header('Location: ' . constant('URL_BASE')); */
}

$_POST = array(); ?>