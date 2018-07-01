<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemLog extends Model
{   
    protected $fillable = ['created_at'];

    protected $table='items_log';
    
    public $timestamps=true;
    
    // overriding default primary key for laravel. Laravel expects it to be 'item_id' by default 
    protected $primaryKey = 'item_log_id';
}
