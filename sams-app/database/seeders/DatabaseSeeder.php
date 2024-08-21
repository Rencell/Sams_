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
            'fname' => 'Rencell',
            'lname' => 'tobelonia',
            'gender' => 'male',
            'birth' => '2004-02-06',
            'email' => 'rencell@gmail.com',
            'password' => 'password'
        ]);

        User::factory()->create([
            'fname' => 'Janice',
            'lname' => 'lumawag',
            'gender' => 'female',
            'birth' => '2003-05-11',
            'email' => 'janice@gmail.com',
            'password' => 'password'
        ]);

        Student::factory(50)->create();
    }
}
