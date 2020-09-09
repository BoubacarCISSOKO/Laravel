<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    //
    protected $fillable = [ 'max', ];
    public $timestamps = false;

    //Les plages de poids sont en relation n:n avec les pays avec colissimos comme pivot :

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'colissimos')->withPivot('price');
    }
}
