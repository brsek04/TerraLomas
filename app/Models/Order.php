<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = ['user_id', 'status']; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class, 'dishes_in_order')->withPivot('quantity');
    }

    public function beverages(): BelongsToMany
    {
        return $this->belongsToMany(Beverage::class, 'beverages_in_order')->withPivot('quantity');
    }
}
