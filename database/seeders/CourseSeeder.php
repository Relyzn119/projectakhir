<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Belajar PHP Dasar',
            'description' => 'Kursus lengkap untuk pemula belajar PHP.',
            'price' => 50000,
            'level' => 'Beginner',
        ]);

        Course::create([
            'title' => 'Laravel untuk Pemula',
            'description' => 'Belajar framework Laravel dari dasar.',
            'price' => 75000,
            'level' => 'Beginner',
        ]);
    }
}
