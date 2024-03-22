<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class RemovePermissionToRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:remove {permission} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove permission from a role';

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
            if ($role->permissions()->detach($permission->id)) {
                $this->info('Permission removed from the role successfully.');
            } else {
                $this->error('Failed to remove permission from the role.');
            }
        } else {
            $this->error('Role or permission not found.');
        }
    }
}
