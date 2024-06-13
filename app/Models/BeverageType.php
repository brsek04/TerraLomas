<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeverageType extends Model
{
    protected $fillable = ['name'];

    public function beverages()
    {
        return $this->hasMany(Beverage::class, 'type_id', 'id');
    }
}
