<?PHP

include('restaurantTwo.php');

class WebParser extends restaurantTwo{
    
    public function index(){
        
        $this->setMenuItem();     
          
    }
    
} // class ends

$parser = new WebParser();
$parser->index();

?>

