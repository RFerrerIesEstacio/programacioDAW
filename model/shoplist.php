<?php 

require_once("model/dbmodel.php");

class shopListElement extends DbModel{

    private int $id;
    private int $idProduct;
    private string $name;
    private float $quantity;
    private float $price;
    private string $type;

    public function __construct(int $id = -1, int $idProduct = -1, string $name = "", float $quantity = 0.0, float $price = 0.0, string $type = ""){

        parent::__construct();
        $this->id = $id;
        $this->idProduct = $idProduct;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->type = $type;

    }
    public function delete(string $shoppingListElementName){
        try{
            $query = $this->connectToDb()->prepare('DELETE FROM shoppingListElement WHERE productId = (SELECT id FROM product WHERE name=:shoppingListElementName);');
            $query -> execute([
                 'shoppingListElementName' => $shoppingListElementName   
            ]);
            return true;
        }
        catch(Exception $e){
            echo $e;
            return false;
        }
    }

    public function deleteListItems(int $shoppingListId){
        try{
            $query = $this->connectToDb()->prepare('DELETE FROM shoppingListElement WHERE shoppingListId = :shoppingListId');
            $query -> execute([
                'shoppingListId' => $shoppingListId
            ]);
            return true;
        }
        catch(Exception $e){
            echo $e;
            return false;
        }
    }

    public function getShoppingItemsList($shoppingListId){
        try{
            $query = 
                $this->connectToDb()->prepare('SELECT s.id, p.id as productId, p.name, s.quantity, p.unitPrice, p.Tipo
                                                FROM shoppingListElement s, product p
                                                WHERE s.productId = p.id AND s.shoppingListId = :shoppingListId');
            $query->execute(['shoppingListId' => $shoppingListId]);
            
            $shoppingListElements = array();

            while ($selectedShoppingListEl = $query->fetch(PDO::FETCH_ASSOC)) {
                $shoppingListElement = new shopListElement();
                $shoppingListElement -> setId(intval($selectedShoppingListEl['id']));
                $shoppingListElement -> setIdProduct(intval($selectedShoppingListEl['productId']));
                $shoppingListElement -> setName($selectedShoppingListEl['name']);
                $shoppingListElement -> setPrice(floatval($selectedShoppingListEl['unitPrice']));
                $shoppingListElement -> setQuantity(floatval($selectedShoppingListEl['quantity']));
                $shoppingListElement -> setType($selectedShoppingListEl['Tipo']);
                array_push($shoppingListElements, $shoppingListElement);
            }

            return $shoppingListElements;
        }
        catch(PDOException $e){
            echo $e;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getIdProduct(){
        return $this->idProduct;
    }

    public function getName(){
        return $this->name;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getType(){
        return $this->type;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setIdProduct(int $idProduct){
        $this->idProduct = $idProduct;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setQuantity(float $quantity){
        $this->quantity = $quantity;
    }

    public function setPrice(float $price){
        $this->price = $price;
    }

    public function setType(string $type){
        $this->type = $type;
    } 
}

?>