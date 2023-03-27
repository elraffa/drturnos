<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });
    
        $permissions = [
            'create patient',
            'view patient',
            'edit patient',
            'delete patient',
            'create appointment',
            'view appointment',
            'edit appointment',
            'delete appointment',
        ];
    
        // foreach ($permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }
    
        // $admin = Role::create(['name' => 'admin']);
        // $admin->givePermissionTo(Permission::all());
    }
}
