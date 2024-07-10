<?php
namespace App\Traits;

use App\Models\Review;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @mixin ModelNotFoundException
 */
trait HasReviews{

    public function reviews(){
        return $this->morphMany(Review::class, 'reviewable');
    }
}