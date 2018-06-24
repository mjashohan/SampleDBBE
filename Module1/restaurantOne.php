<?PHP

include('../ModuleDatabase/DatabaseModel.php'); // include database model
include('htmlParser.php'); // include the PHP Parser Library
require '../StringModifier.php' ; // string modifier helper class

define('webPageUrl','http://lapausa.de/menue/'); // set the URL of restaurant menu pages


class RestaurantOne extends DatabaseModel{
    
    private $html;
    private $stringModifier;

    function __construct() {
        
        $this->html = file_get_html(webPageUrl);
        $this->stringModifier = new StringModifier();

    }

    // ***** Save all data from DOM ***** //
    function setMenuItem(){

        $totalMenuItem=count($this->html->find('span.menu_title')); // total number of menu items in the webpage
        $allMenuName=$this->html->find('span.menu_title'); // array of objects of all span of class menu_title
        $allMenuDetails=$this->html->find('div.menu_excerpt'); // array of objects of all div of class menu_excerpt
        $allMenuPrice=$this->html->find('span.menu_price'); // array of objects of all span with class menu_price
        $allMenuImages=$this->html->find('img'); // array of objects of all item images
        
        for ($i=0; $i<$totalMenuItem; $i++){
            
            $price=$this->stringModifier->modifyString($allMenuPrice[$i]->innertext); //remove currency sign from price
            $this->saveMenuItems($totalMenuItem,$allMenuName[$i]->innertext,$allMenuDetails[$i]->innertext,
                                 $price,$allMenuImages[$i]->src,webPageUrl); // save data in the database
        
        } // loop ends
    
    } 
        

} // class ends


?>

