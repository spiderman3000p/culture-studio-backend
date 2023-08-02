<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
