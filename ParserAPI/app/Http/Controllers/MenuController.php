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


}
