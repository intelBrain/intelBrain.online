<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name',
        'product_code',
        'product_brand',
        'product_description',
        'product_details',
        'no_of_products',
        'category_id',
        'discount',
        'product_old_price',
        'product_new_price'
    ];
}
