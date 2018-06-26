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

    // return searched items
    public function getSearchedItem($queryName){

        $result = Item::where('itemName',$queryName)->get(); // returns array of objects
        return $result;
    }

    

}
