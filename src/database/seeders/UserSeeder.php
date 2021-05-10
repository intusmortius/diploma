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

        $users = User::factory()->count(50)->create();
        foreach ($users as $user) {
            $user->assignRole("worker");
        }
        $users = User::factory()->count(50)->create();
        foreach ($users as $user) {
            $user->assignRole("customer");
        }
    }
}
