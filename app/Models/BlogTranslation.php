<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogTranslation extends Model
{
    use HasFactory;

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    protected $fillable = [
        'blog_id',
        'locale',
        'title',
        'description',
    ];
}
