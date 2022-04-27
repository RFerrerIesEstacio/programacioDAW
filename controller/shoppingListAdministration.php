<?php

$user = getUserSession();
$action ="";

if(!empty($_POST['action'])){
    $action = $_POST['action'];
}
consoleLog($action);
if (!empty($_POST)){
    consoleLog($action);
    $isShoppingListOk = false;
    $lista = new ShoppingList();

    switch($action){
        case "Create":
        case "Update":
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
            break;

        case "Delete":
            consoleLog("entra");
            $shoppingListId = intval($_POST['shoppingListId']); 
            $shoppingListElement = new shopListElement();
            $isShoppingListOk = $shoppingListElement->deleteListItems($shoppingListId);
            $isShoppingListOk = $isShoppingListOk && $lista -> delete($shoppingListId);

            break;

        case "deleteProduct":

            $shoppingListElement = new shopListElement();
            $shoppingListItemName = $_POST['shoppingListName'];
            $isShoppingListOk = $shoppingListElement -> delete($shoppingListItemName);

            break;

        case "addProduct":
            
            if(!empty($_POST["selectedProduct"]) && !empty($_POST["productQuantity"])){
                consoleLog("entra");
                $selectedProductID = intval($_POST['selectedProduct']);
                $productQuantity = floatval($_POST['productQuantity']);
                $shoppingListId = intval($_POST['shoppingListId']);
                $shoppingListElement = new shopListElement();
                $isShoppingListOk = $shoppingListElement->addListItem($shoppingListId, $selectedProductID, $productQuantity);
            }
        break;

        default:
            header('Location: ' . constant('URL_BASE'));
        break;

    }

    if($isShoppingListOk)
    header('Location: ' . constant('URL_BASE'));

    $_POST = array();

   /*  if($action == "Create" || $action == "Update"){
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
        $isShoppingListOk = 
        $shoppingListElement = new shopListElement();
        $isShoppingListOk = $shoppingListElement->deleteListItems($shoppingListId);
        $isShoppingListOk = $isShoppingListOk && $lista -> delete($shoppingListId);
    }
    else if($action == "deleteProduct"){
        $shoppingListElement = new shopListElement();
        $shoppingListItemName = $_POST['shoppingListName'];
        $isShoppingListOk = $shoppingListElement -> delete($shoppingListItemName);
    }
    
    if($isShoppingListOk)
    header('Location: ' . constant('URL_BASE'));

    $_POST = array(); */

}
?>