<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $table="carts";
    protected $primaryKey = "cart_id";
    protected $fillable = [
        "user_id",
        "menu_id",
        "invoice_code",
        "qty",
        "total_harga",
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'menu_id','product_id');
    }
}
