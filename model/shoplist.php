<?php class shopListElement{
    private int $idProduct;
    private string $name;
    private float $quantity;
    private float $price;
    private string $type;

    public function __construct(int $idProduct, string $name, int $quantity, int $price, string $type){

        $this->idProduct = $idProduct;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->type = $type;

    }

    public function getId(){
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

    public function setId(int $idProduct){
        $this->idProduct = $idProduct;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setEmail(int $quantity){
        $this->quantity = $quantity;
    }

    public function setImage(int $price){
        $this->price = $price;
    }

    public function setType(int $type){
        $this->type = $type;
    } 
}

?>