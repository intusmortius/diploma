<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255', Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            // 'role_id' => $input['role_id'],
            'customer_work_place' => $input['customer_work_place'],
            'worker_specialization' => $input['worker_specialization'],
            'password' => Hash::make($input['password']),
        ]);
        if ($input['role_id'] == 1) {
            $user->assignRole("worker");
        } else if ($input['role_id'] == 2) {
            $user->assignRole("customer");
        }

        return $user;
    }
}
