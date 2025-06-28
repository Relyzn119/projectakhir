<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function checkout($id)
    {
        $user = Auth::user();
        $course = Course::findOrFail($id);


        $alreadyBought = Transaction::where('user_id', $user->id) //verif
            ->where('course_id', $course->id)
            ->where('status', 'success')
            ->exists();

        if ($alreadyBought) {
            return redirect()->back()->with('message', 'Kamu sudah membeli kursus ini.');
        }


        Transaction::create([ //save ke database
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => 'success',
            'payment_date' => Carbon::now(),
        ]);

        return redirect()->route('dashboard')->with('message', 'Berhasil checkout!');
    }


    public function userTransactions() //riwayat
    {
        $transactions = Transaction::with('course')
            ->where('user_id', Auth::id())
            ->orderBy('payment_date', 'desc')
            ->get();

        return view('transactions.user', compact('transactions'));
    }
}
