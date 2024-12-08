<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    public function productSizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }
}
