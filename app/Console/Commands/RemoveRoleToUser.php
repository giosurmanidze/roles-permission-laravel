<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RemoveRoleToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:remove {email : The email address of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove role from a user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if ($user) {
            if ($user->role_id) {
                $user->role_id = null;
                $user->save();
                $this->info("Role removed from user with email '$email'");
            } else {
                $this->info('User does not have a role assigned');
            }
        } else {
            $this->error('User not found');
        }
    }
}
