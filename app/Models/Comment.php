<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeForBlog($query, Blog $blog)
    {
        return $query->where('blog_id', $blog->id);
    }

    public function scopeForIp($query, string $ip)
    {
        return $query->where('ip_address', $ip);
    }

    public function scopeForUserAgent($query, string $userAgent)
    {
        return $query->where('user_agent', $userAgent);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    protected $guarded = [
        'id',
        'blog_id',
        'user_id',
    ];

    protected $fillable = [
        'user_id',
        'blog_id',
        'name',
        'email',
        'comment',
        'ip_address',
        'user_agent',
        'is_approved',
    ];
}
