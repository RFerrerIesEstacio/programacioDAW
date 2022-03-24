<?php 

    require_once('model/dbmodel.php');

    class User extends DbModel{

    private int $id;
    private string $name;
    private string $username;
    private string $adress;
    private string $email;
    private string $avatarImage;

    public function __construct(string $name = '', string $email = '', string $avatarImage = '', string $username = '', string $adress = ''){

        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->avatarImage = $avatarImage;
        $this->username = $username;
        $this->adress = $adress;
    }

    public function getByName(string $name){

        try{
            $query = $this->connectToDb()->prepare('SELECT * FROM user WHERE name = :name');
            $query -> execute(['name' => $name]);
            $selectedUser = $query -> fetch(PDO::FETCH_ASSOC);
            $user = new User();

            
            if($query->rowCount() > 0){

                $user-> setId($selectedUser['id']);
                $user-> setName($selectedUser['name']);
                $user-> setEmail($selectedUser['email']);
                $user-> setImage($selectedUser['avatarImage']);
                $user-> setUsername($selectedUser['username']);
                $user-> setAdress($selectedUser['adress']);
            }

            return $user;
            
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getImage(){
        return $this->avatarImage;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getAdress(){
        return $this->adress;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setImage(string $image){
        $this->avatarImage = $image;
    }

    public function setUsername(string $username){
        $this->username = $username;
    }

    public function setAdress(string $adress){
        $this->adress = $adress;
    }

    
}

?>