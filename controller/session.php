<?php 

function startSession(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function closeSession(){
    session_unset();
    session_destroy();
}

function getUserSession(){
    if ( isset($_SESSION['user.id']) && isset($_SESSION['user.name']) && isset($_SESSION['user.username']) && isset($_SESSION['user.adress']) && isset($_SESSION['user.email']) && isset($_SESSION['user.avatarImage'])){
        return new User($_SESSION['user.name'], $_SESSION['user.email'], $_SESSION['user.avatarImage'], $_SESSION['user.username'], $_SESSION['user.adress'], '', $_SESSION['user.id']);
    } else {
        return null;
    }
}

function setUserSession(User $user){
    $_SESSION['user.name'] = $user->getName();
    $_SESSION['user.username'] = $user->getUsername();
    $_SESSION['user.email'] = $user->getEmail();
    $_SESSION['user.adress'] = $user->getAdress();
    $_SESSION['user.avatarImage'] = $user->getImage();
    $_SESSION['user.id'] = $user->getId();
}

function unsetUserSession() {
    unset($_SESSION['user.name']);
    unset($_SESSION['user.username']);
    unset($_SESSION['user.email']);
    unset($_SESSION['user.adress']);
    unset($_SESSION['user.avatarImage']);
    unset($_SESSION['user.id']);
}

function getSessionVariable(string $variableName){
    return isset($_SESSION[$variableName]) ? $_SESSION[$variableName] : null;
}

function setSessionVariable(string $variableName, $value){
    $_SESSION[$variableName] = $value;
}
function unsetSessionVariable(string $variableName){
    unset($_SESSION[$variableName]);
}

function setLanguageSession(string $language = ''){
    if ($language == null) $language = constant('DEFAULT_LANGUAGE');
    $_SESSION['language'] = $language;
    $fileTraslationPath = "language/" . $language . ".json";
    $stringFileContents = file_get_contents($fileTraslationPath);
    if(!$stringFileContents){
        echo "Error al leer el fichero  de traducciones para el idioma " . $language;
    }
    $decodedJson = json_decode($stringFileContents, true);
    if($decodedJson === null){
        echo "Error al decodificar el fichero de traducciones para el idioma " . $language;
    }
    $traslationsArray = [];
    foreach ($decodedJson as $traslationKey => $traslationValue){
        $traslationsArray[$traslationKey] = $traslationValue;
    }

    $_SESSION['traslationArray'] = $traslationsArray;

}

function getLanguageSesion(){
    $languageSesion = $_SESSION['language'];
    if($languageSesion === null) $languageSesion = setLanguageSession(constant('DEFAULT_LANGUAGE'));
    return $languageSesion;
}

function getTraslationValue(string $traslationKey){
    $traslationString = "NO_EXISTE_TRADUCCIÓN";
    if (isset($_SESSION) && array_key_exists('traslationArray', $_SESSION) && array_key_exists($traslationKey, $_SESSION['traslationArray'])) {
        $traslationString = $_SESSION['traslationArray'][$traslationKey];
    }
    else{
        startSession();
        setLanguageSession();
    }
    if ($traslationString === null) $traslationString = "NO_EXISTE_TRADUCCIÓN";
    return $traslationString;
}