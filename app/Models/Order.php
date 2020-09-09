<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'shipping', 'tax', 'user_id', 'state_id', 'payment', 'reference', 'pick', 'total',
    ];
    
    //Une commande a plusieurs adresses
    public function adresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    //et plusieurs produits,
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    //d’autre part elle appartient à un état
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    //d’autre part elle appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Enfin elle a une information de paiement
    public function payment_infos()
    {
        return $this->hasOne(Payment::class);
    }

    //On met aussi en place quelques accesseurs
    public function getPaymentTextAttribute($value)
    {
    $texts = [
      'carte' => 'Carte bancaire',
      'virement' => 'Virement',
      'cheque' => 'Chèque',
      'mandat' => 'Mandat administratif',
    ];
    return $texts[$this->payment];
    }

    public function getTotalOrderAttribute()
    {
        return $this->total + $this->shipping;
    }

    public function getTvaAttribute()
    {
        return $this->tax > 0 ? $this->total / (1 + $this->tax) * $this->tax : 0;
    }

    public function getHtAttribute()
    {
        return $this->total / (1 + $this->tax);
    }
    
}
