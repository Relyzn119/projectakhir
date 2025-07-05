<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::with('course', 'user')
            ->where('status', 'success')
           ->get()
->values()
->map(function ($tx, $index) {
    return [
        'No' => $index + 1,
        'Nama User' => $tx->user->name ?? '-',
        'Kursus' => $tx->course->title ?? '-',
        'Tanggal Bayar' => \Carbon\Carbon::parse($tx->payment_date)->format('d M Y'),
        'Status' => ucfirst($tx->status),
    ];
});

    }
     public function headings(): array
    {
        return ['No', 'Nama User', 'Kursus', 'Tanggal Bayar', 'Status'];
    }
}
