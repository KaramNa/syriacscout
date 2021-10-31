<?php

namespace App\Providers;

use App\Models\Scout\PersonalInfo;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public $scoutId;
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("superUser", function ($user) {
            return ($user->user_type === "superUser");
        });

        Gate::define("SupeUser-admin", function ($user) {
            return ($user->user_type === "admin" || $user->user_type === "superUser");
        });

    }
}