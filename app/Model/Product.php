<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Product extends Model
{
    protected $guarded = [];


    protected $with = ['category', 'brand'];

    protected $casts = [
        'size' =>'json',
        'color' =>'json',
   ];

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
