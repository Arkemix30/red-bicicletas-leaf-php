<?php

namespace App\Models;

class Bike extends Model
{
    protected $table = 'bikes';
    protected $fillable = ['model', 'color', 'description', 'rent_price', 'image', 'lat', 'lng'];
     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

}
