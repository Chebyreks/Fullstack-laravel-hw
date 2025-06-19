<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_good extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'price',
        'good_id',
        'order_id'
    ];

    public function good(): BelongsTo
    {
        return $this->belongsTo(Good::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
