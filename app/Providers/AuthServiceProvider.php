<?php
namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Policies\PermissionPolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        $actions = [
            'user' => ['view', 'add', 'edit', 'delete'],
            'role' => ['view', 'add', 'edit', 'delete'],
            'permission' => ['view', 'add', 'edit', 'delete'],
            'setting' => ['view', 'add', 'edit', 'delete'],
            'banner' => ['view', 'add', 'edit', 'delete'],
            'service' => ['view', 'add', 'edit', 'delete'],
            'review' => ['view', 'add', 'edit', 'delete'],
            'faqs' => ['view', 'add', 'edit', 'delete'],
            'gallery' => ['view', 'add', 'edit', 'delete'],
            'page' => ['view', 'add', 'edit', 'delete'],
            'package' => ['view', 'add', 'edit', 'delete'],
            'menu' => ['view', 'add', 'edit', 'delete'],
        ];
        foreach ($actions as $entity => $permissions) {
            foreach ($permissions as $permission) {
                Gate::define("{$permission}-{$entity}", function ($user) use ($entity, $permission) {
                    return $user->role && $user->role->permissions->contains("permission.{$entity}.{$permission}", '1');
                });
            }
        }
    }
}
