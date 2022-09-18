<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function($user) {
            $user_id = Auth::user()->id;
            $role = UserRole::where('role_name',"=","admin" )->first();
            if($role->user_id == $user_id){
                return true ;

            }else{
                return false;
            }
    });
}

}