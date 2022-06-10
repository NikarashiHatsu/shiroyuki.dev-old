<?php

namespace App\Models;

use App\Enums\BlogEnums;
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

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function getDescriptionTrimmedAttribute(): string
    {
        return mb_strimwidth($this->description, 0, 100, '...');
    }

    public function getThumbnailUrlAttribute()
    {
        return Storage::url($this->thumbnail);
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->isoFormat('LL');
    }

    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case BlogEnums::DRAFT->name:
                return "<span class='badge badge-ghost'>" . BlogEnums::DRAFT->name . "</span>";
                break;
            case BlogEnums::PUBLISHED->name:
                return "<span class='badge badge-success'>" . BlogEnums::PUBLISHED->name . "</span>";
                break;
            case BlogEnums::ARCHIVED->name:
                return "<span class='badge badge-error'>" . BlogEnums::ARCHIVED->name . "</span>";
                break;
            case BlogEnums::PRIVATE->name:
                return "<span class='badge badge-warning'>" . BlogEnums::PRIVATE->name . "</span>";
                break;
            default:
                return "<span class='badge badge-ghost'>TIDAK DIKETAHUI</span>";
                break;
        }
    }

    public function isLiked(): bool
    {
        if (auth()->user()) {
            /** @var \App\Models\User */
            $user = auth()->user();
            return $user->likes()->forBlog($this)->count();
        }

        if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            return $this->likes()->forIp($ip)->forUserAgent($userAgent)->count();
        }

        return false;
    }

    public function removeLike(): bool
    {
        if (auth()->user()) {
            /** @var \App\Models\User */
            $user = auth()->user();
            return $user->likes()->forBlog($this)->delete();
        }

        if (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            return $this->likes()->forIp($ip)->forUserAgent($userAgent)->delete();
        }

        return false;
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
        'status',
        'thumbnail',
    ];
}
