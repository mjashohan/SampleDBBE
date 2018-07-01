<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\ItemLog;

define('updateAPIUrl',"http://localhost/WebParser/MenuUpdate.php");

class MenuController extends Controller
{
    
    // return all menu Items
    public function getAllItem()
    {
        $result = Item::all();
        return $result ? json_encode($result) : json_encode("No Dishes Avaialable"); // return json data to client side
    }

    // return searched items by item name
    public function getItemsByName($queryName){
        
        header('Access-Control-Allow-Origin: *'); 
        $result = Item::where('itemName', 'like', '%' . $queryName . '%')->get(); // returns array of objects
        return $result ? json_encode($result) : json_encode("No Dishes Avaialable"); // return json data to client side
    }

    // return searched items by ingredients name
    public function getItemsByIngredient($queryText){
        
        $result = Item::where('ingredients','LIKE', '%'. $queryText . '%')->get(); // returns array of objects
        return $result ? json_encode($result) : json_encode("No Dishes Avaialable"); // return json data to client side
    }

    // return searched item by ingredients or item name
    public function getItemsBySearchQuery($queryString){

        $result  =  Item::where(function ($query) use($queryString) {
                          $query->where('itemName',$queryString)
                                ->orWhere('ingredients', 'like', '%' . $queryString . '%');
                    })->get(); // return array of objects
        
        return $result ? json_encode($result) : json_encode("No Dishes Avaialable"); // return json data to client side
    }

    // update the menu dishes 
    public function updateMenu(){

        // check time interval before update operation
        if($this->checkDateInterval()){
            $data = Item::all(); // get old data
            return $data ? json_encode($data) : json_encode("No Dishes Avaialable"); // return json data to client side
        }else{
            $this->updateLogData();
            Item::truncate(); // truncate Item table. It won't work if this model has foreign key dependencies.
            file_get_contents(updateAPIUrl); // call update method within the Core Parser
            $data = Item::all(); // get updated data
            return $data ? json_encode($data) : json_encode("No Dishes Avaialable"); // return json data to client side
        }
    
    }

    // check update request time interval
    public function checkDateInterval(){

        $currentDate = date('Y-m-d H:i:s');
        $lastUpdateDated = ItemLog::first()->updated_at;
        $hourdiff = round((strtotime($lastUpdateDated) - strtotime($currentDate))/3600, 1);
        return ($hourdiff <= 24) ? false : true; // return false if update query performed within last 24 hours
    }

    // update item log table data 
    public function updateLogData(){

        ItemLog::truncate(); //remove old entry
        $log = new ItemLog();
        $log->created_at= date('Y-m-d H:i:s');
        $log->updated_at= date('Y-m-d H:i:s');
        $log->save(); // create new log entry
    } 
   

}
