<?PHP

/*

@ Updates the Item table
@ Accessible from client side
@ class invoked when hit in the ParserAPI via '/api/v1/update-menu' endpoint

*/

include_once('Module1/restaurantOne.php'); // include restaurantOne class
include_once('Module2/restaurantTwo.php'); // include restaurantTwo class
include_once('Module3/restaurantThree.php'); // include restaurantThree class


class MenuUpdate{


     public function index(){

       
        // update menu for restaurant one
        $restaurantOne = new restaurantOne();
        $restaurantOne->setMenuItem(); 
        // update menu for restaurant two
        $restaurantTwo = new restaurantTwo();
        $restaurantTwo->setMenuItem();
        //update menu for restaurant three
        $restaurantThree = new restaurantThree();
        $restaurantThree->setMenuItem();
        
      
     }


}

$menu = new MenuUpdate();
$menu->index();


?>