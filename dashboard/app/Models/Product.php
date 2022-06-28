<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'price',
        'quantity',
        'code',
        'image',
        'status',
        'brand_id',
        'subcategory_id',
        'desc_en',
        'desc_ar'
    ];
}
