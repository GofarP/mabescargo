<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales After Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('dashboardthemeassets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <style>
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h3>Laporan Sebar Brosur</h3>
        <p>{{ \Carbon\Carbon::parse($mulai_dari)->format('d M Y') }} -
            {{ \Carbon\Carbon::parse($sampai_dengan)->format('d M Y') }}
        </p>
    </div>
    <button class="btn btn-success btn-print" onclick="window.print()">Print</button>
    <div class="table-responsive text-nowrap mt-3">


        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Toko</th>
                    <th>Karyawan</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Pernah Pakai Ekspedisi</th>
                    <th>Nama Ekspedisi</th>
                    <th>Biaya</th>
                    <th>Kenal MBS Cargo</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_sebar_brosur as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->nama_toko }}</td>
                        <td>{{ $item->karyawan->nama }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->pernah_pakai_ekspedisi }}</td>
                        <td>{{ $item->nama_ekspedisi }}</td>
                        <td>{{ number_format($item->biaya) }}</td>
                        <td>{{ $item->kenal_mbs_cargo }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
