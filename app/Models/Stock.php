<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    public function getNextDeliveryDateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }
}
