<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'ProductImage',
        'ProductTitle',
        'ProductDescription',
        'ProductPrice'
    ];
}
