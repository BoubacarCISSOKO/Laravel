<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    //
    protected $fillable = [
        'name', 'firstname', 'professionnal', 'civility', 'company', 'address', 'addressbis', 'bp', 'postal', 'city', 'phone', 'country_id', 'facturation',
    ];

    //Une adresse de commande appartient à un pays :

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
