<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryAgent extends Model
{
    public $timestamps = false;
    protected $table = "delivery_agents";
    protected $fillable = [
        'name',
        'active'
    ];

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

        public function getTable()
    {
        return 'delivery_agents';
    }
}
