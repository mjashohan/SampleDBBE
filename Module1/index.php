<?PHP

include('restaurantOne.php');

class WebParser extends restaurantOne{
    
    public function index(){
         
          $this->setMenuItem();  
          
    }
    
} // class ends

$parser = new WebParser();
$parser->index();

?>

