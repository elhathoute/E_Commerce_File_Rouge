<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public function sizes()
    {
        return $this->belongsToMany(Size::class,'color_size');
    }

    public function paniers()
    {
        return $this->belongsToMany(Panier::class,'product_size');
    }
}
