<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogComment extends Model
{
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
