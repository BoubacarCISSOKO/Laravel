<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Et la propriété $fillable dans le modèle Product :
    protected $fillable = [
        'name', 'price', 'quantity', 'weight', 'active', 'quantity_alert', 'image', 'description',
    ];
}
