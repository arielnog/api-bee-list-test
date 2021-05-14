<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'scientific_name'
    ];

    public function pollinationPlants()
    {
        return $this->belongsToMany(Plants::class,'pollination_plants_bee');
    }

}
