<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    public function blogComments(): HasMany
    {
        return $this->hasMany(BlogComment::class);
    }
}
