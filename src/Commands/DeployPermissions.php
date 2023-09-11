<?php

namespace WebWhales\Permissions\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DeployPermissions extends Command
{
    public $signature = 'deploy:permissions';

    public $description = 'Deploy the roles and permissions in the database from the config file "permissions.php".';

    public function handle(): int
    {
        $rolesAndPermissions = $this->getConfigFile();

        $this->info('Deploying roles and permissions...');

        match(config('permission.deploy-type')) {
            'permissions-only' => $this->deployPermissionsOnly($rolesAndPermissions),
            'roles-and-permissions' => $this->deployRolesAndPermissions($rolesAndPermissions),
            default => $this->error('The deploy type is not valid. current: ' . config('permission.deploy-type')),
        };

        return self::SUCCESS;
    }

    /**
     * @param  array<int, string>  $permissions
     */
    private function deployPermissionsOnly(array $permissions): void
    {
        foreach ($permissions as $permission) {
            Permission::fistOrCreate(['name' => $permission]);
        }
    }

    /**
     * @param  array<string, array<string, array<string>>>  $rolesAndPermissions
     */
    private function deployRolesAndPermissions(array $rolesAndPermissions): void
    {
        foreach ($rolesAndPermissions as $role => $permissions) {
            $role = Role::firstOrCreate(['name' => $role]);
            $permissions = collect();

            foreach ($permissions as $model => $action) {
                $permission[] = Permission::firstOrCreate(['name' => "$model.$action"]);
            }

            $role->syncPermissions($permissions);
        }
    }

    private function getConfigFile()
    {
        return config('permissions');
    }
}
