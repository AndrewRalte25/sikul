<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Guardian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'string'], // Assuming role is passed in the input
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);

        // Add user to role-specific table based on role
        switch ($input['role']) {
            case '1':
                Teacher::create([
                    'user_id' => $user->id,
                    // Add other role-specific fields here
                ]);
                break;
            case '2':
                Guardian::create([
                    'user_id' => $user->id,
                    'name' => $input['name'],
                    'email' => $input['email'],
                    ]);
                break;
            case '3':
                Student::create([
                        'user_id' => $user->id,
                        // Add other role-specific fields here
                    ]);
                break;
            // Add cases for other roles as needed
        }

        return $user;
    }
}

