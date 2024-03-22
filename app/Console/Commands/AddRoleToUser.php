<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class AddRoleToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:add {email : The email address of the user} {role : The role name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a role to a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $roleName = $this->argument('role');

        $user = User::where('email', $email)->first();
        $role = Role::where('name', $roleName)->first();

        if ($user && $role) {
            $user->role_id = $role->id;
            $user->save();
            $this->info("Role '$roleName' added to user with email '$email'");
        } else {
            $this->error('User or role not found');
        }
    }
}
