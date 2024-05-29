<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checkout extends Model
{
    use HasFactory;
    protected $table="checkouts";
    protected $primaryKey = "invoice_code";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        "invoice_code",
        "user_id",
        "total",
        "status",
        "coupon",
        "payment"
    ];

    protected $casts = [
        "created_at"=>"datetime",
        "updated_at"=>"datetime"

    ];

    
    public function user(): BelongsTo
    // banyak checkout untuk 1 user
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cart(): HasMany
    // 1 checkout untuk banyak cart
    {
        return $this->hasMany(Cart::class, 'invoice_code');
    }
}
