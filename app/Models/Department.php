<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'key',
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function getMainImageAttribute($value)
    {
        return url($value);
    }
}
