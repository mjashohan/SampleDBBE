<?PHP

include('restaurantOne.php');

class WebParser{
    
    public function index(){
        
        $restaurantOne = new RestaurantOne();
        $restaurantOne->setMenuItem();     
          
    }
    
} // class ends

$parser = new WebParser();
$parser->index();

?>

