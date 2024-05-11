<?php

//session_start();

include './Db_connect.php';

//error_reporting(false);

class InsertData extends Db
{
    public $name;
    public $number;

    public function insert()
    {
        $this->name = $_POST["name"];
        // Check if number is set and not empty
        $this->number = isset($_POST["number"]) ? intval($_POST["number"]) : null;
        
        // Check if number is a valid integer
        if ($this->number === null) {
            // Handle empty or non-integer value
            echo "Invalid number input!";
            return false;
        }

        $pdo = Db::connection(self::DBNAME, self::USERNAME);
        $stmt = $pdo->prepare("INSERT INTO user(name, number) VALUES (:name, :number)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':number', $this->number, PDO::PARAM_INT); // Bind parameter as integer
       
        if ($stmt->execute()) {
            echo "Data inserted successfully!";
            return true;
        } else {
            echo "Error inserting data!";
            return false;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $obj = new InsertData();
    $obj->insert();
}
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
    <form action="" method="POST">
        Name:<input type="text" name="name"><br>
        contact_number <input type="number" name="number"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
