<?php
include './Db_connect.php';
error_reporting(false);
class Edit extends Db
{

    public $data;
     public $id ;
     public $name;
     public $number ;
public function edit()
{
    $this->id = $_GET['id'];
    $this->name=$_POST["name"];
     $this->number = $_POST['number'];
    
    //$pdo = connection();
    $pdo=Db::connection(self::DBNAME,self::USERNAME);
    $stmt = $pdo->prepare("select * from  user  where id='$this->id'");
    $stmt->execute();
    $this->data = $stmt->fetch(PDO::FETCH_OBJ);
  }
}

$obj=new Edit();
$obj->edit();


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

    <form action="update.php?id=<?php echo $obj->data->id; ?>" method="POST" >
        name:<input type="text" name="name" value="<?php echo $obj->data->name; ?>"> 
        <br>
      
        number:<input type="number" name="number" value="<?php echo $obj->data->number; ?>">
       

        <br>



        <button type="submit">Submit</button>
         
    </form>  
       
   

  
</body>

</html>

