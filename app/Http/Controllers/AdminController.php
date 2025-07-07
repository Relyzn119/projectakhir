<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DashboardExport;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCourses = Course::count();
        $totalTransactions = Transaction::where('status', 'success')->count();
        $totalIncome = Transaction::where('status', 'success')
            ->join('courses', 'transactions.course_id', '=', 'courses.id')
            ->sum('courses.price');

        return view('dashboard.admin', compact('totalCourses', 'totalTransactions', 'totalIncome'));
    }

    public function listCourses()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }


    public function createCourse()
    {
        return view('admin.courses.create');
    }


    public function storeCourse(Request $request)
    {
      $request->validate([
    'title' => 'required',
    'description' => 'required',
    'price' => 'required|numeric',
    'level' => 'required',
    'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
]);

$data = $request->all();
$data['user_id'] = Auth::id();

if ($request->hasFile('thumbnail')) {
    $file = $request->file('thumbnail');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images/thumbnails'), $filename);
    $data['thumbnail'] = 'images/thumbnails/' . $filename;
}

Course::create($data);

return redirect()->route('admin.courses')->with('message', 'Kursus berhasil ditambahkan!');

    }


    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }


    public function updateCourse(Request $request, $id)
    {
        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'level' => 'required',
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $course = Course::findOrFail($id);

    $data = $request->all();

    if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/thumbnails'), $filename);
        $data['thumbnail'] = 'images/thumbnails/' . $filename;
    }

    $course->update($data);

    return redirect()->route('admin.courses')->with('message', 'Kursus berhasil diperbarui!');
    }


    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses')->with('message', 'Kursus berhasil dihapus!');
    }

    public function transactionReport()
    {
       $transactions = Transaction::with(['course', 'user'])
        ->where('status', 'success')
        ->orderBy('payment_date', 'desc')
        ->get();

    return view('admin.transactions.index', compact('transactions'));
    }
    public function statisticsData()
{
    $totalCourses = Course::count();
    $totalTransactions = Transaction::where('status', 'success')->count();
    $totalIncome = Transaction::where('status', 'success')
        ->join('courses', 'transactions.course_id', '=', 'courses.id')
        ->sum('courses.price');

     $monthlySales = \App\Models\Transaction::selectRaw('strftime("%m", payment_date) as month, count(*) as total')
        ->where('status', 'success')
        ->groupBy('month')
        ->get();

    return response()->json([
        'monthlySales' => $monthlySales
    ]);
}
public function exportPdf()
{
    $transactions = Transaction::with('course', 'user')->where('status', 'success')->get();
    $pdf = Pdf::loadView('admin.transactions.export_pdf', compact('transactions'));

    return $pdf->download('laporan-transaksi.pdf');
}
public function exportDashboardPdf()
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

    $pdf = Pdf::loadView('exports.dashboard-pdf', compact(
        'totalCourses', 'totalTransactions', 'totalIncome', 'monthlySales'
    ));

    return $pdf->download('laporan-penjualan-dashboard.pdf');
}

public function exportDashboardExcel()
{
    return Excel::download(new DashboardExport, 'laporan-penjualan-dashboard.xlsx');
}

}
