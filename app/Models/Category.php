<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}