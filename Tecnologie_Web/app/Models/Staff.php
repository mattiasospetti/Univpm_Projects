<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;

class Staff {
    
    protected $table = 'users';
    protected $guarded = ['id'];
    public $timestamps = false;
    
    public function getProdsCats() {
        return Category::where('parId', '!=', 0)->get();
    }
    
    public function getDiscounted() {
        return ['0'=>'No' , '1'=>'Si'];
    }

}

