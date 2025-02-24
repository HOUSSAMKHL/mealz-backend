<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titre',
        'start_date',
        'end_date',
        'price',
        'daysAvailable'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'plan_id');
    }
}
