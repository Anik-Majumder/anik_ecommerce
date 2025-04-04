<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function cart(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class);
    }

    public function productSizes(): HasMany
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productColors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
    }
    public function getRouteKeyName()
    {
        return 'product_slug'; // Now Laravel will look for the `product_slug` column
    }

}
