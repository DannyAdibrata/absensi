<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@email.com',
            'password'=>bcrypt('12345678')
        ]);

        Student::create([
            'nis'=>'student',
            'nama'=>'student',
            'rombel'=>'student',
            'rayon'=>'student',
            'email'=>'student@email.com',
            'password'=>bcrypt('12345678')
        ]);


    }
}
