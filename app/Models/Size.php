<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    // public function products(){
    //     return $this->belongsToMany(Product::class);
    // }
    public function colors()
    {
        return $this->belongsToMany(Color::class,'color_size')->withPivot('price','quantity','offer','product_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_size');
    }

    public function paniers()
    {
        return $this->belongsToMany(Panier::class,'product_size');
    }
}
