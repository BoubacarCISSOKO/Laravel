<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = [
        'name', 'tax',
    ];
    public $timestamps = false;
    //public $timestamps = false;
    //Un pays a plusieurs plages de poids (et réciproquement) 

    public function ranges()
    {
        //On récupère les frais de port dans la table pivot colissimos.
        return $this->belongsToMany(Range::class, 'colissimos')->withPivot('id', 'price');
    }

    //, adresses
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    //et adresses de commande :
    public function order_addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }
}
