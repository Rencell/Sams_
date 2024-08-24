<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'fname' => 'teacher',
            'lname' => 'delacruz',
            'gender' => 'male',
            'birth' => '2004-02-06',
            'email' => 'teacher@gmail.com',
            'password' => 'password'    
        ]);

        User::factory()->create([
            'fname' => 'admin',
            'lname' => 'admin',
            'gender' => 'female',
            'birth' => '2003-05-11',
            'isAdmin' => '1',
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);
        User::factory()->create([
            'fname' => 'Admin', 
            'lname' => 'Admin',
            'gender' => 'male',
            'birth' => '2003-05-11',
            'isAdmin' => '2',
            'email' => 'superadmin@gmail.com',
            'password' => 'password'
        ]);

        Student::factory(50)->create();
    }
}
