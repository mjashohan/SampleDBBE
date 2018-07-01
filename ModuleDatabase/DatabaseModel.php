<?PHP

include('database-config-local.php'); // include database configuration file


class DatabaseModel{
    
    
    protected function saveMenuItems($count,$name,$ingredient,$price,$image,$webUrl,$phone,$address){
        
        $connection = mysqli_connect(db_HOST,db_USER, db_PASS,db_NAME)
        or die("Could not connect to the Project Database:<br />" . mysql_error());
        
        $sql = "INSERT INTO Items (itemName, price, ingredients,image,webUrl,phone,address) 
                VALUES ('$name', '$price', '$ingredient','$image','$webUrl','$phone','$address')";
        
        if(mysqli_query($connection, $sql)){
            echo "Data Inserted successfully.";
        } else{
            echo "ERROR: Can not execute $sql. " . mysqli_error($connection);
        }

        
    } // function ends
    


    protected function saveLogData(){

        $connection = mysqli_connect(db_HOST,db_USER, db_PASS,db_NAME)
        or die("Could not connect to the Project Database:<br />" . mysql_error());
        
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO items_log (created_at, updated_at) 
                VALUES ('$date', '$date')";
        
        if(mysqli_query($connection, $sql)){
            // @todo 
        } else{
            // @todo
        }
    }

} // end of class


?>