<?php

namespace App\Models;

use App\Traits\HasReviews;
use App\Traits\ActiveScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{

    use HasFactory;
    use HasReviews;
    use ActiveScope;

    protected $fillable = [
        'stripe_product_id',
        'stripe_price_id'
    ];

    protected $casts = [
        'images' => 'array',
        'name' => 'array',
        'desc' => 'array'
    ];

    protected $appends = [
        'reviews_count',
        'reviews_avg',
        'is_favorite'
    ];


    // RELATIONS

    /**
     * Get the related products that have the same group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relatedProducts(): HasMany
    {
        return $this->hasMany(self::class, 'group', 'group')->where('id', '!=', $this->id)->take(5);
    }

    /**
     * The categories that belong to the product.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'product_categories');
    }

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'categories')
            ->join('product_categories', 'categories.id', '=', 'product_categories.category_id')
            ->where('product_categories.product_id', $this->id)
            ->distinct();
    }

    /**
     * The attributes that belong to the product.
     *
     * @return BelongsToMany
     */
    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function getMainImageAttribute($value): string
    {
        return url($value);
    }

    public function getImagesAttribute($value): array
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        if (!is_array($value)) {
            return [];
        }

        return array_map(function ($image) {
            return url($image);
        }, $value);
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }

    public function getReviewsAvgAttribute()
    {
        $average = $this->reviews()->average('rating');
        if ($average === null) {
            return null;
        }

        return round($average * 2) / 2;
    }

    public function getIsFavoriteAttribute()
    {
        return Auth::check() && Auth::user()->favoriteProducts()->where('product_id', $this->id)->exists();
    }
}
