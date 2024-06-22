<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // Otros campos del pedido
    ];

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
