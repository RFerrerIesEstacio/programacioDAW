<?php
require_once("model/dbModel.php");
class ShoppingList extends DbModel{

    private int $id;
    private string $name;
    private string $description;
    private int $userId;
    private string $image;

    public function __construct(int $id = -1, string $name = '', string $description = '', int $userId = -1, $image = ''){

        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->userId = $userId;
        $this->image = $image;
    }

    public function create(){
        try {
            $query = $this->connectToDb()->prepare('INSERT INTO shoppinglist(name, description, userId, image) VALUES(:name, :description, :userId, :image)');
            $query->execute([
                'name'  => $this->name,
                'description'  => $this->description,
                'userId'  => $this->userId,
                'image'  => $this->image
            ]);
            return true;
            } catch (PDOException $e){
                return false;
                consoleLog($e);
        }
    }
    public function update(int $shopListId, string $newName, string $newDescription, string $image){
        consoleLog($image);
        try {
                $query = $this->connectToDb()->prepare('UPDATE shoppinglist SET name = :name, description = :description, image = :image WHERE id = :shoppingListId');
                $query -> execute([
                    'name' => $newName,
                    'description' => $newDescription,
                    'shoppingListId' => $shopListId,
                    'image' => $image
                ]);
            return true;
        }
        catch(Exception $e){
            echo $e;
            return false;
        }
    }

    public function delete($shoppingListId){
        try {
           
            $query = $this->connectToDb()->prepare('DELETE FROM shoppinglist WHERE id =:shoppingListId');
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

    public function getListByUserId(string $userId){

        try{
            $query = $this->connectToDb()->prepare('SELECT * FROM shoppinglist WHERE userId = :userId');
            $query -> execute(['userId' => $userId]);
            $selectedUser = $query -> fetch(PDO::FETCH_ASSOC);
            $list = new ShoppingList();  
            if($query->rowCount() > 0){

                $list-> setId($selectedUser['id']);
                $list-> setName($selectedUser['name']);
                $list-> setDescription($selectedUser['description']);
                $list-> setUserId($selectedUser['userId']);
                $list-> setImage($selectedUser['image']);

                
            } 

            return $list;

        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getImage(){
        return $this->image;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setImage(string $image){
        $this->image = $image;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function setUserId(int $userId){
        $this->userId = $userId;
    }
}
?>