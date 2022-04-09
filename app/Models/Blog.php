<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getThumbnailUrlAttribute()
    {
        return Storage::url($this->thumbnail);
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->isoFormat('LL');
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'user_id',
        'slug',
        'category_id',
        'title',
        'description',
        'thumbnail',
    ];
}
