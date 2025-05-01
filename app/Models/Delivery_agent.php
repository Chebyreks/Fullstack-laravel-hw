<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery_agent extends Model
{
    protected $fillable = [
        'name',
        'active'
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
