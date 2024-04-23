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
            'role' => ['required', 'string'], 
            'phone' => ['required', 'string', 'digits:10'], 
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

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
                // dd($input);
                Guardian::create([
                    'user_id' => $user->id,
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    ]);
                break;
            case '3':
                Student::create([
                        'user_id' => $user->id,
                      
                    ]);
                break;
           
        }

        return $user;
    }
}

