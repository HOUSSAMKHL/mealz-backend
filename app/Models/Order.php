<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_day',
        'order_date',
        'order_status',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'order_meal', 'order_id', 'meal_id')
            ->withPivot('meal_date')
            ->withTimestamps();
    }
}
