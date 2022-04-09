<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
    ];
}
