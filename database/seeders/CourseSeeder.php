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
            [
            'title' => 'Laravel Dasar',
            'description' => 'Pelajari dasar-dasar Laravel untuk membangun aplikasi web.',
            'price' => 150000,
            'level' => 'Pemula',
            'thumbnail' => 'https://www.bing.com/images/search?view=detailV2&ccid=9a%2fAxn7p&id=F3FB31387206260E527AC84B1A84DE31CCE508F8&thid=OIP.9a_Axn7p2_FPnPB0XAvepAHaEi&mediaurl=https%3a%2f%2fpng.pngtree.com%2ftemplate%2f20221104%2fourlarge%2fpngtree-employee-training-programs-program-vector-image_1850778.jpg&exph=640&expw=1045&q=gambar+Course+program&simid=608006691254912194&FORM=IRPRST&ck=D32D59D25EAA677876D05867DD7C8426&selectedIndex=1&itb=0',
            'user_id' => 1,
            ],
        ];

        foreach ($courses as $data) {
            Course::create(array_merge($data, [
                'user_id' => $admin->id,
            ]));
        }

    }
}
