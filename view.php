<?php



include './Db_connect.php';


class View extends Db
{

         public  $data;
        final public function selctAll()
        {
            $pdo=Db::connection(self::DBNAME,self::USERNAME);
            $stmt=$pdo->prepare("select * from user");
            $stmt->execute();
            $this->data=$stmt->fetchAll(PDO::FETCH_OBJ);
            $this->stmt = $stmt;
            return $this;
        } 

    }

        $obj=new View();

       $obj->selctAll();

    foreach ($obj->data as $data) { ?>
    <br>

    <h2>Name: <?php echo $data->name; ?></h2>

    <h2>Number:<?php echo $data->number; ?></h2>
  
  
    
   
    <a href="Edit.php?id=<?php echo $data->id; ?>">edit</a>
    
    <a href="Delete.php?id=<?php echo $data->id; ?>">delete</a>

    

   

   

    

<?php } ?>

