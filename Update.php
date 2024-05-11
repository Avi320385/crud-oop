<?php

include './Db_connect.php';
//error_reporting(false);


class Update extends Db
{
    public $id ;
    public $number ;
    public $name;

public function updateMethod()
{
      $this->id= $_GET['id'];
      $this->number= $_POST['number'];
      $this->name =$_POST["name"];
      $pdo=Db::connection(self::DBNAME,self::USERNAME);
      $stmt = $pdo->prepare("UPDATE user set name='$this->name', number='$this->number' where id ='$this->id'");
      $stmt->execute();
     // $data = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->stmt = $stmt;
      //return $this;


      if ($stmt) {
        header("Location: View.php");
    }
                return $this;

    }
}

$obj=new Update();
$obj->updateMethod();
//var_dump($obj->updateMethod());