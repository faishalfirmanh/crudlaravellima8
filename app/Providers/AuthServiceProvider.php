<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy', //tambahan
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies(); //kebawah tambahan
        //JSON_DECODE, karena tipe datadidb bertie JSON string ARRAY ,UNTUK MENGUBAH Menjadi php array
        Gate::define('manage-user',function($user){
          return count(array_intersect(["ADMIN"],json_decode($user->roles)));
        });
        Gate::define('manage-category',function($user){
          return count(array_intersect(["STAFF","ADMIN"],json_decode($user->roles)));
        });
        Gate::define('manage-book',function($user){
          return count(array_intersect(["STAFF","ADMIN"],json_decode($user->roles)));
        });
        Gate::define('manage-order',function($user){
          return count(array_intersect(["STAFF","ADMIN"],json_decode($user->roles)));
        });
        //
    }
}
