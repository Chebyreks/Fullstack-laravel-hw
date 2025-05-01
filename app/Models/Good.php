<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Good extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];

    public function ordergood(): HasMany
    {
        return $this->hasMany(Order_good::class);
    }
}
