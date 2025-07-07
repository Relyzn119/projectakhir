
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; font-size: 14px; }
    </style>
</head>
<body>
    <h2>Laporan Penjualan - Dashboard</h2>
    <p>Tanggal: {{ now()->format('d M Y') }}</p>

    <p><strong>Total Kursus:</strong> {{ $totalCourses }}</p>
    <p><strong>Transaksi Sukses:</strong> {{ $totalTransactions }}</p>
    <p><strong>Total Pemasukan:</strong> Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>

    <h4>Pemasukan Bulanan</h4>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Pemasukan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monthlySales as $item)
                <tr>
                    <td>{{ \Carbon\Carbon::create()->month((int) $item->month)->translatedFormat('F') }}</td>
                    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

