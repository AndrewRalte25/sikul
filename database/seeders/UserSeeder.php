<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert the admin user
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12341234'),
            'role' => '0',
        ]);

        // Insert the guardian user and get the ID
        $guardianId = DB::table('users')->insertGetId([
            'name' => 'guardian',
            'email' => 'guardian@guardian.com',
            'password' => Hash::make('12341234'),
            'role' => '2',
        ]);

        // Insert the guardian into the guardians table
        DB::table('guardians')->insert([
            'user_id' => $guardianId,
            'name' => 'guardian',
            'email' => 'guardian@guardian.com',
            'phone' => '9862123456',
        ]);

        // Define the teacher users to be added
        $teachers = [
            [
                'name' => 'Teacher1',
                'email' => 'teacher1@teacher.com',
                'phone' => '1234567891',
            ],
            [
                'name' => 'Teacher 2',
                'email' => 'teacher2@teacher.com',
                'phone' => '1234567892',
            ],
            [
                'name' => 'Teacher 3',
                'email' => 'teacher3@teacher.com',
                'phone' => '1234567893',
            ],
            [
                'name' => 'Teacher 4',
                'email' => 'teacher4@teacher.com',
                'phone' => '1234567894',
            ],
            [
                'name' => 'Teacher 5',
                'email' => 'teacher5@teacher.com',
                'phone' => '1234567895',
            ],
        ];
        foreach ($teachers as $teacher) {
            $userId = DB::table('users')->insertGetId([
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'password' => Hash::make('password123'), // Default password
                'role' => '1',
            ]);

            DB::table('teachers')->insert([
                'user_id' => $userId,
                'name' => $teacher['name'],
                'email' => $teacher['email'],
                'phone' => $teacher['phone'],
            ]);
        }
    }
}
