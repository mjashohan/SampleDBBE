<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Mass fillable fields for Items table when using Create() or Update() funtion
    protected $fillable = ['itemName', 'price','ingredients', 'image', 'webUrl'];
    
    protected $table='items';
    public $timestamps=true;
    
    // overriding default primary key for laravel. Laravel expects it to be 'item_id' by default 
    protected $primaryKey = 'itemId';
}
