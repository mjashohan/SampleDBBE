<?PHP

include_once($_SERVER['DOCUMENT_ROOT'].'/WebParser/ModuleDatabase/DatabaseModel.php'); // include database model
require_once($_SERVER['DOCUMENT_ROOT'].'/WebParser/htmlParser.php'); // include the PHP Parser Library
require_once($_SERVER['DOCUMENT_ROOT'].'/WebParser/StringModifier.php'); // string modifier helper class

define('webPageUrlTwo','https://www.lastellanera.de/pizza-und-speisekarte/'); // set the URL of restaurant menu pages
define('phone','030 23949708'); // set the phone number of restaurant. @todo needed to be parsed later
define('address','Leykestraße 18,12053 Berlin-Neukölln'); // set the address of restaurant. @todo needed to be parsed later


class RestaurantTwo extends DatabaseModel{
    
    private $html;
    private $stringModifier;

    function __construct() {
        
        $this->html = file_get_html(webPageUrlTwo);
        $this->stringModifier = new StringModifier();

    }

    // ***** Save all data from DOM ***** //
    function setMenuItem(){

        $totalMenuItem=count($this->html->find('div.wow')); // total number of menu items in the webpage
        $allMenuName=$this->html->find('h4'); // array of objects of all h4 tag of menu name
        $allMenuDetails=$this->html->find('div.menu-text'); // array of objects of all div of class menu_excerpt
        $allMenuPrice=$this->html->find('span.menu-price'); // array of objects of all span with class menu-price
        
        for ($i=0; $i<=$totalMenuItem; $i++){
            
            $price=$this->stringModifier->modifyString($allMenuPrice[$i]->innertext); //remove currency sign from price
            $this->saveMenuItems($totalMenuItem,$allMenuName[$i]->innertext,$allMenuDetails[$i]->innertext,
                                 $price,NULL,webPageUrlTwo,phone,address); // save data in the database
        
        } // loop ends
        
    } 
    

} // class ends


?>

