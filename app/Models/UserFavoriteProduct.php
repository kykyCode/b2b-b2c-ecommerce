<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'department_id',
    ];

    /**
     * Get the user that owns the user department.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the department that is associated with the user.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
