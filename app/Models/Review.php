<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $table="reviews";
    protected $primaryKey = "review_id";
    protected $fillable = [
        "name",
        "email",
        "message",
        "status",
        "product_id",
    ];

    protected $casts = [
        "created_at"=>"datetime",
        "updated_at"=>"datetime"

    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
