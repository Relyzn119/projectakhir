<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Course;
use App\Models\Transaction;



class DashboardExport implements  FromView
{
   
    public function view(): View
    {
        $totalCourses = Course::count();
        $totalTransactions = Transaction::where('status', 'success')->count();
        $totalIncome = Transaction::where('status', 'success')
            ->join('courses', 'transactions.course_id', '=', 'courses.id')
            ->sum('courses.price');

        $monthlySales = Transaction::selectRaw('strftime("%m", payment_date) as month, SUM(courses.price) as total')
            ->join('courses', 'transactions.course_id', '=', 'courses.id')
            ->where('status', 'success')
            ->groupBy('month')
            ->get();

        return view('exports.dashboard-excel', compact(
            'totalCourses', 'totalTransactions', 'totalIncome', 'monthlySales'
        ));
    }
}
