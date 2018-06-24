<?PHP

include('database-config-local.php'); // include database config file

class DatabaseModel{
    
    
    protected function saveMenuItems($count,$name,$ingredient,$price,$image,$webUrl){
        
        $connection = mysqli_connect(db_HOST,db_USER, db_PASS,db_NAME)
        or die("Could not connect to the Project Database:<br />" . mysql_error());
        
        $sql = "INSERT INTO Items (itemName, price, ingredients,image,webUrl) 
                VALUES ('$name', '$price', '$ingredient','$image','$webUrl')";
        
        if(mysqli_query($connection, $sql)){
            echo "Data Inserted successfully.";
        } else{
            echo "ERROR: Can not execute $sql. " . mysqli_error($connection);
        }
        
    } // function ends
    
        
} // end of class


?>