<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'sum_price',
        'delivery_agent_id'
    ];

    public function good(): HasMany
    {
        return $this->hasMany(Order_good::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function delivery_agent(): BelongsTo
    {
        return $this->belongsTo(DeliveryAgent::class);
    }
}
