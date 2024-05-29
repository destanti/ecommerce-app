<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $primaryKey = "product_id";
    protected $fillable = [
        "nama_product",
        "kategori_product",
        "gambar_product",
        "description",
        "price",
        "status",
    ];
}
