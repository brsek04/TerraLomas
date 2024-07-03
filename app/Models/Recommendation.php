<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Recommendation extends Model
{
    protected $fillable = ['recommendation_name', 'branch_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function dishInRecommendations()
    {
        return $this->hasMany(DishInRecommendation::class, 'recommendation_id', 'id');
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_in_recommendation', 'recommendation_id', 'dish_id');
    }

    public function beverageInRecommendations()
    {
        return $this->hasMany(BeverageInRecommendation::class, 'recommendation_id', 'id');
    }

    public function beverages()
    {
        return $this->belongsToMany(Beverage::class, 'beverage_in_recommendation', 'recommendation_id', 'beverage_id');
    }
}
