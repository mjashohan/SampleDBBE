<?PHP

/*

@ Parse Restaurant Pages and store in the Item table

*/

include_once('Module1/restaurantOne.php'); // include restaurantOne class
include_once('Module2/restaurantTwo.php'); // include restaurantTwo class
include_once('Module3/restaurantThree.php'); // include restaurantThree class
include_once('ModuleDatabase/DatabaseModel.php'); // include database class


class WebParser extends DatabaseModel{


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
        
        // insert log data into items log table
        $this->saveLogData();
    }

}

$parser = new WebParser();
$parser->index();


?>