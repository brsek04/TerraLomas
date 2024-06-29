<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dishes_in_order')->withPivot('quantity');
    }

    public function beverages()
    {
        return $this->belongsToMany(Beverage::class, 'beverages_in_order')->withPivot('quantity');
    }
}
