<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'create_post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'edit_post', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'delete_post', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
