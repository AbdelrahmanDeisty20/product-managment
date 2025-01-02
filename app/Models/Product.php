<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'image', 'price', 'quantity');
    // protected $appends = array('thumbnail_full_path');
    // public function getThumbNailFullPathAttrobute()
    // {
    //     return asset($this->image);
    // }
}
