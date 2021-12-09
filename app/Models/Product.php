<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'description', 'size', 'price', 'stock', 'state', 'storeId', 'vendorId', 'photo_path', 'portada1', 'portada2', 'portada3'
    ];
}
