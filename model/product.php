<?php 

    require_once('model/dbmodel.php');

    class Product extends DbModel{

    private int $id;
    private string $name;
    private string $description;
    private string $image;
    private string $unitPrice;


    public function __construct(
        string $name = "", 
        string $description  = "", 
        string $image = "", 
        float $unitPrice = 0.0,
        int $id = -1
    )
    {
        parent::__construct();
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->image = $image;
        $this->unitPrice = $unitPrice;
        $this->id = $id;
    }

    public function getAll(){
        try{
            $query = 
                $this->connectToDb()->prepare('SELECT * FROM product');
            $query->execute();
            
            $productList = array();

            while ($retrievedProduct = $query->fetch(PDO::FETCH_ASSOC)) {
                $selectedProduct = new Product();
                $selectedProduct -> setId(intval($retrievedProduct['id']));
                $selectedProduct -> setName($retrievedProduct['name']);
                $selectedProduct -> setDescription($retrievedProduct['description']);
                $selectedProduct -> setImage($retrievedProduct['image']);
                $selectedProduct -> setUnitPrice(floatval($retrievedProduct['unitPrice']));
                array_push($productList, $selectedProduct);
            }

            return $productList;
        }
        catch(PDOException $e){
            echo $e;
            return null;
        }
    }

    public function checkProductOnList(int $idList){
        try{
            $product = $this->getId();
            $query = $this->connectToDb()->prepare('SELECT * FROM shoppinglistelement WHERE shoppingListId = :shoppingListId AND productId = :productId');
            $query -> execute(['shoppingListId' => $idList,
                                'productId' => $product]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                return true;
            }
        return false;
        }
        catch(PDOException $e){
            echo $e; 
            return null;
        }  
    }
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    public function getUnitPrice(){
        return $this->unitPrice;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setImage(string $image){
        $this->image = $image;
    }

    public function setUnitPrice(float $unitPrice){
        $this->unitPrice = $unitPrice;
    }
    
}

?>