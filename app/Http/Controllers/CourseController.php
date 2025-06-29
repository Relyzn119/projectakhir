<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     // ini daftar semua kursus, nanti tambahkan aja bagian show dan dashboard fel
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }


    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $transactions = Transaction::with('course')
            ->where('user_id', $user->id)
            ->where('status', 'success')
            ->get();

        return view('dashboard.user', compact('transactions'));
    }
}
