<?PHP

include('restaurantThree.php');

class WebParser extends restaurantThree{
    
    public function index(){
        
        $this->setMenuItem();     
          
    }
    
} // class ends

$parser = new WebParser();
$parser->index();

?>

