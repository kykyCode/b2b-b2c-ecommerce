<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method_id',
        'total',
        'paid',
        'status',
        'checkout_session_id',
        'checkout_session_url'
    ];

    protected $casts = [
        'total' => 'float',
        'paid' => 'boolean'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(Payment::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
