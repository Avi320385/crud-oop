<?php 

class Db{

    public $stmt;
    const DBNAME="Practice";
    const USERNAME="root";

   final public function connection($Db_var,$Db_user,$password = null)
    {
        try{
            return new PDO("mysql:host=127.0.0.1;dbname={$Db_var};",$Db_user, $password);
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

   final public function callPdo()
    {   
        $pdo=Db::connection(self::DBNAME,self::USERNAME);
        $stmt = $pdo->prepare("select * from  user");
        $stmt->execute();
        $this->stmt = $stmt;
        return $this;
    }
        final public function updatePdo($id,$name,$number)
        {
            $pdo=Db::connection(self::DBNAME,self::USERNAME);
            $stmt = $pdo->prepare("UPDATE user set name='$name', number='$number' where id ='$id'");
            $stmt->execute();
           // $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->stmt = $stmt;
            return $this;
        } 

}

// class User extends Db{

//     public static function all(){
//         $stmt = new Self;
//         return $stmt->callPdo()->stmt->fetch(PDO::FETCH_ASSOC);
//     }
// }

// $users = User::all();

// var_dump($users);





class User extends Db{

    public static function all(){
        $stmt = new Self;
        return $stmt->callPdo()->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function find()
    {
      
        $stmt = new Self;
       // var_dump(($stmt));
        return $stmt->updatePdo(1,'Noman',123)->stmt->fetch(PDO::FETCH_ASSOC);
  
    }
}

$users = User::all();

var_dump($users);
$user = User::find();

//var_dump($user);
















// $user = User::find(1);

// $user->name = 'upda'
// $user->number = '123'

// $user->save();
