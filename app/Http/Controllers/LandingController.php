<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil 3 kursus terbaru dari database
        $courses = Course::latest()->take(3)->get();

        return view('landing', compact('courses'));
    }
}
