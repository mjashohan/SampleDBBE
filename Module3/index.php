<?PHP

include('restaurantThree.php');

class WebParser{
    
    public function index(){
        
        $restaurantThree = new RestaurantThree();
        $restaurantThree->setMenuItem();     
          
    }
    
} // class ends

$parser = new WebParser();
$parser->index();

?>

