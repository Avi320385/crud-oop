<?php

//session_start();

include './Db_connect.php';

//error_reporting(false);



class InsertData extends Db
{
    public $name;

     public  $number;
  
    public function insert()
    {
        $this->name = $_POST["name"];
        $this->number = $_POST["number"];
        $pdo=Db::connection(self::DBNAME,self::USERNAME);
         $stmt=$pdo->prepare("INSERT INTO user(name,number) VALUES  ('$this->name','$this->number')");
         $stmt->execute();
         $this->stmt = $stmt;
         
         //$stmt->execute();
       
         // return $this;

    
}
   
}

$obj=new InsertData();
//var_dump($obj->name);
$obj->insert();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""method ="POST">

    Name:<input type="text" name="name">
    <br>
    contact_number <input type="int" name="number">
 
    <br>
    <button type ="submit">submit</button>
    </form>
</body>
</html>