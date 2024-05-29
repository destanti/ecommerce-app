<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table="abouts";
    protected $primaryKey = "about_id";
    protected $fillable = [
        "logo",
        "phone",
        "address",
        "email",
        "description",
    ];
}
