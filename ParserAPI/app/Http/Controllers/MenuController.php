<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

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
        return $result;
    }

    // return searched items by ingredients name
    public function getItemsByIngredient($queryText){
        
        $result = Item::where('ingredients','LIKE', '%'. $queryText . '%')->get(); // returns array of objects
        return $result;

    }

    
}
