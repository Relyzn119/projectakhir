<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Cari user admin pertama
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            // Jika belum ada, buat user admin default
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@kursus.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]);
        }

        // Buat data kursus dummy
        $courses = [
            [
                'title' => 'Belajar Laravel Dasar',
                'description' => 'Pelajari dasar-dasar Laravel untuk pemula.',
                'price' => 150000,
                'level' => 'Pemula',
            ],
            [
                'title' => 'Mastering PHP OOP',
                'description' => 'Pahami konsep Object Oriented Programming dalam PHP.',
                'price' => 120000,
                'level' => 'Menengah',
            ],
            [
                'title' => 'Java Spring Boot Basics',
                'description' => 'Memulai pengembangan web dengan Java Spring Boot.',
                'price' => 180000,
                'level' => 'Pemula',
            ],
        ];

        foreach ($courses as $data) {
            Course::create(array_merge($data, [
                'user_id' => $admin->id,
            ]));
        }
    }
}
