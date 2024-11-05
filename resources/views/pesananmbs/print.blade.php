<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan Mbs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('dashboardthemeassets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

        <style>
            @media print{
                .btn-print{
                    display: none;
                }
            }
        </style>
</head>

<body>
    <div class="text-center">
        <h3>Laporan Pesanan Mbs Cargo</h3>
        <p>{{ \Carbon\Carbon::parse($mulai_dari)->format('d M Y') }} -
            {{ \Carbon\Carbon::parse($sampai_dengan)->format('d M Y') }}
        </p>
    </div>
    <button class="btn btn-success btn-print" onclick="window.print()">Print</button>
    <table class="table table-hover w-100">
        <thead>
            <tr>
                <th>No</th>
                <th>STT</th>
                <th>No Resi</th>
                <th>Tanggal Masuk</th>
                <th>Wilayah Asal</th>
                <th>Wilayah Tujuan</th>
                <th>Cabang</th>
                <th>Customer</th>
                <th>Karyawan</th>
                <th>Jalur</th>
                <th>Total Biaya</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pesanan_mbs as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->stt ?? '-'}}</td>
                <td>{{$item->resi ?? '-'}}</td>
                <td>{{\Carbon\Carbon::parse($item->waktu_pesan)->format('d-M-Y') ?? '-'}}</td>
                <td>{{$item->daerahasal->nama ?? '-'}}</td>
                <td>{{$item->daerahtujuan->nama ?? '-'}}</td>
                <td>{{$item->cabang->nama ?? '-'}}</td>
                <td>{{$item->customer->nama ?? '-'}}</td>
                <td>{{$item->marketing->nama ?? '-'}}</td>
                <td>{{$item->jalur->nama ?? '-'}}</td>
                <td>{{number_format($item->total_biaya ?? '-')}}</td>
                <td>{{$item->statuspembayaran->nama ?? '-'}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10"><b>Total</b></td>
                <td><b>{{number_format($total_biaya_sum)}}</b></td>
            </tr>
        </tfoot>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
