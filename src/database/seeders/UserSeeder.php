<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::all() as $role) {
            $users = User::factory()->count(50)->create();
            foreach ($users as $user) {
                $user->assignRole($role);
            }
        }
    }
}
