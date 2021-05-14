<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plants extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'name',
        'scientific_name',
        'description',
        'photo_path',
    ];

    public function floweringMonths()
    {
        return $this->belongsToMany(Month::class,'flowering_months');
    }

    public function beePollination()
    {
        return $this->belongsToMany(Bee::class,'pollination_plants_bee');
    }
}
