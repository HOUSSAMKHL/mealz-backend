<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'meals';
    protected $primaryKey = 'id'; // Laravel utilise 'id' par défaut

    protected $fillable = [
        'meal_img',
        'meal_title',
        'meal_description',
        'meal_categorie'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_meal', 'meal_id', 'order_id')
            ->withPivot('meal_date')
            ->withTimestamps();
    }
    
}
