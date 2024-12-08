<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategories(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function productSizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
    }
}
