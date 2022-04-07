<?php

$user = getUserSession();
$action ="";

if(!empty($_POST['action'])){
    $action = $_POST['action'];
}
consoleLog($action);
if (!empty($_POST)){
    
    $isShoppingListOk = false;
    $lista = new ShoppingList();

    if($action == "Create" || $action == "Update"){
        if (!empty($_POST['name']) && !empty($_POST['description'])){
            $nombreLista = $_POST['name'];
            $descripcionLista = $_POST['description'];
            $image = $_POST['image'];
            $shoppingListId = intval($_POST['shoppingListId']);
            $isShoppingListOk = false;
            $lista = new ShoppingList (-1, $nombreLista, $descripcionLista, $user-> getId(),$image);

            if($shoppingListId == -1)
                $isShoppingListOk = $lista ->create();
            else
                $isShoppingListOk = $lista ->update($shoppingListId, $nombreLista, $descripcionLista, $image);
        }
    }
    else if($action == "Delete"){
        $shoppingListId = intval($_POST['shoppingListId']); 
        $isShoppingListOk = $lista -> delete($shoppingListId);
    }
    
    if($isShoppingListOk)
    header('Location: ' . constant('URL_BASE'));

    $_POST = array();

}
?>