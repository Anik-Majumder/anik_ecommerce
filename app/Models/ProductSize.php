<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSize extends Model
{
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
