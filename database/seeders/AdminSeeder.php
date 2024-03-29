<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => fake()->name(),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'avatar' => 'https://cof.org/sites/default/files/documents/files/NadiaBrighamSquare.jpg',
            'date_of_birth' => fake()->date(),
            'gender' => 'male',
            'nationality' => 'kenya',
            'id_pass_birth_cirt' => Str::random(5),
            'contact_number' => fake()->phoneNumber(),
            'address' => fake()->address()
        ])->assignRole('admin');
    }
}
