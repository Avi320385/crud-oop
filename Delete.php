<?php

include './Db_connect.php';
class Delet extends Db 
{
    
   public $id;

public function delete()
{
    $this->id=$_GET['id'];
    $pdo=Db::connection(self::DBNAME,self::USERNAME);
    $stmt = $pdo->prepare("DELETE  from user where id =$this->id");
    $stmt->execute();
    if ($stmt) {
    header("Location: View.php");
}
}

}

$obj=new Delet();
$obj->delete();