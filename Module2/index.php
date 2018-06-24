<?PHP

include('restaurantTwo.php');

class WebParser{
    
    public function index(){
        
        $restaurantTwo = new RestaurantTwo();
        $restaurantTwo->setMenuItem();     
          
    }
    
} // class ends

$parser = new WebParser();
$parser->index();

?>

