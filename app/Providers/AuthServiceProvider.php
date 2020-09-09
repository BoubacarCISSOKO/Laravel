<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

//use App\Models\Order;
//use App\Policies\OrderPolicy;
use App\Models\{ Address, Order };
use App\Policies\{ AddressPolicy, OrderPolicy };

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    //Il ne reste plus qu’à enregistrer l’autorisation dans le provider AuthServiceProvider :
    protected $policies = [
        Address::class => AddressPolicy::class,
        Order::class => OrderPolicy::class,
    ];
   
       
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
