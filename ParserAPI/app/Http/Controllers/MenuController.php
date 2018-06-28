<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

define('updateAPIUrl','http://localhost/WebParser/MenuUpdate.php');

class MenuController extends Controller
{
    
    // return all menu Items
    public function getAllItem()
    {
        return Item::all();
    }

    // return searched items by item name
    public function getItemsByName($queryName){

        $result = Item::where('itemName',$queryName)->get(); // returns array of objects
        return $result?$result:" No Dishes Found! Try another please! ";
    }

    // return searched items by ingredients name
    public function getItemsByIngredient($queryText){
        
        $result = Item::where('ingredients','LIKE', '%'. $queryText . '%')->get(); // returns array of objects
        return $result?$result:" No Dishes Found! Try another please! ";

    }


    // return searched item by ingredients or item name
    public function getItemsBySearchQuery($queryString){

        $result  =  Item::where(function ($query) use($queryString) {
                          $query->where('itemName',$queryString)
                                ->orWhere('ingredients', 'like', '%' . $queryString . '%');
                    })->get(); // return array of objects
        
        return $result?$result:" No Dishes Found! Try another please! ";
    }

    // update the menu dishes 
    public function updateMenu(){

        Item::truncate(); // truncate Item table. It won't work if this model has foreign key dependencies.
        file_get_contents("http://localhost/WebParser/MenuUpdate.php");
        
    }
   
}
