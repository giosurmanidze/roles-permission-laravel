<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class AddPermissionToRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:add {role} {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a permission to a role';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleName = $this->argument('role');
        $permissionName = $this->argument('permission');

        $role = Role::where('name', $roleName)->first();
        $permission = Permission::where('name', $permissionName)->first();

        if ($role && $permission) {
            $role->permissions()->attach($permission);
            $this->info('Permission added to role');
        } else {
            $this->error('Role or Permission not found');
        }

    }
}
