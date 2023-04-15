<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function brande(){
        return $this->belongsTo(Brande::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }

    public function detail_product(){
        return $this->hasOne(DetailProduct::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }

}
