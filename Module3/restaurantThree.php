<?PHP

include('../ModuleDatabase/DatabaseModel.php'); // include database model
include('htmlParser.php'); // include the PHP Parser Library
require '../StringModifier.php' ; // string modifier helper class

define('webPageUrl','https://www.flypizzaservice.de/'); // set the URL of restaurant menu pages


class RestaurantThree extends DatabaseModel{
    
    private $html;
    private $stringModifier;

    function __construct() {
        
        $this->html = file_get_html(webPageUrl);
        $this->stringModifier = new StringModifier();
    }

    // ***** Save all data from DOM ***** //
    function setMenuItem(){

        $totalMenuItem=count($this->html->find('b')); // total number of menu items in the webpage
        $allMenuName=$this->html->find('b'); // array of objects of all b tag for item name
        $allMenuDetails=$this->html->find('span[itemprop="description"]'); // array of objects of all span of itemproperty description
        $allMenuPrice=$this->html->find('span.price'); // array of objects of all span with class price
        $phone=$this->html->find('span[itemprop="telephone"]')[0]->innertext; // string
        $address=$this->html->find('span[itemprop="streetAddress"]')[0]->innertext.' , '
                .$this->html->find('span[itemprop="addressLocality"]')[0]->innertext; // string concated restaurant address

        for ($i=0; $i<$totalMenuItem; $i++){
        
            $price=$this->stringModifier->modifyString($allMenuPrice[$i]->innertext); //remove currency sign from price
            $this->saveMenuItems($totalMenuItem,$allMenuName[$i]->innertext,$allMenuDetails[$i]->innertext,
                                 $price,NULL,webPageUrl,$phone,$address); // save data in the database
        
        } // loop ends
        
    } 
        

} // class ends


?>

