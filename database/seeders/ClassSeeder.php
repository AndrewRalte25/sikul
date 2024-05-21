<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            'Class-1',
            'Class-2',
            'Class-3',
            'Class-4',
            'Class-5',
            'Class-6',
        ];

        $subjects = [
            'English',
            'Math',
            'Science',
            'History',
        ];

        foreach ($classes as $class) {
            $classId = DB::table('classses')->insertGetId(
                [
                    'class_name' => $class,
                ]
            );

            foreach ($subjects as $subject) {
                DB::table('subjects')->insert([
                    [
                        'class_id' => $classId,
                        'subject_name' => $subject . '-' . explode('-', $class)[1],
                    ]
                ]);
            }
        }
    }
}
