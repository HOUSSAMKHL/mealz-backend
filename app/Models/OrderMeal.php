<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMeal extends Model
{
    use HasFactory;


    protected $table = 'order_meal'; // Assurez-vous que la table est correctement définie


    protected $fillable = [
        'order_id',
        'meal_id',
        'meal_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class); // Assurez-vous d'avoir un modèle Meal si vous l'utilisez.
    }
}
