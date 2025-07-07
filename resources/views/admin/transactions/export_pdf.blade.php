<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi Relyzn Course</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Kursus</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $i => $tx)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $tx->user->name }}</td>
                    <td>{{ $tx->course->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($tx->payment_date)->format('d-m-Y') }}</td>
                    <td>{{ $tx->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
