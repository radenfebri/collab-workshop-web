<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot th {
            text-align: right;
        }
        tfoot td {
            font-weight: bold;
        }
        .success {
            color: green;
        }
        .review {
            color: blue;
        }
        .processing {
            color: red;
        }

        .tolak {
            color: black;
        }

        .date-range {
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buku</th>
                <th>Nama Pembeli</th>
                <th>Harga Buku</th>
                <th>Metode</th>
                <th>Kode Pesanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHarga = 0;
                $startDate = null;
                $endDate = null;
            @endphp
            @foreach ($data as $no => $item)
                @php
                    // Mengatur tanggal awal jika belum diatur sebelumnya
                    if ($startDate === null) {
                        $startDate = $item->created_at->format('d-M-Y');
                    }
                    // Mengatur tanggal akhir untuk setiap iterasi
                    $endDate = $item->created_at->format('d-M-Y');
                @endphp
                <tr>
                    <td>{{ $no + 1 }} </td>
                    <td>{{ $item->buku->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp. {{ number_format($item->total_price) }}</td>
                    <td>{{ $item->bank->nama_bank }}</td>
                    <td><b>{{ $item->tracking_no }}</b></td>
                    <td>
                        @if ($item->status == 1)
                            <span class="success">Berhasil</span>
                        @elseif ($item->status == 2)
                            <span class="review">Review</span>
                        @elseif ($item->status == 0)
                            <span class="processing">Proses</span>
                        @elseif ($item->status == 3)
                            <span class="tolak">Tolak</span>
                        @endif
                    </td>
                </tr>
                @php
                    $totalHarga += $item->total_price;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Harga Keseluruhan</th>
                <th>Rp. {{ number_format($totalHarga) }}</th>
                <th colspan="3"></th>
            </tr>
        </tfoot>
    </table>
    <div class="date-range">
        Rentang Tanggal: <b>{{ $startDate }}</b> Sampai <b>{{ $endDate }}</b>
    </div>
</body>
</html>