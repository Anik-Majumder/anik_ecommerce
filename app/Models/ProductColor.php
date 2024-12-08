<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColor extends Model
{
    public function colors(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
