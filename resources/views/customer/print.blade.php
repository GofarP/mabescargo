<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <h2 class="text-center mt-4">Laporan Customer</h2>
    <h4 class="text-center mt-3">{{ \Carbon\Carbon::parse($mulai_dari)->format('d/m/Y') }} -
        {{ \Carbon\Carbon::parse($sampai_dengan)->format('d/m/Y') }}</h4>

    <button class="btn btn-success btn-print" onclick="window.print()">Print</button>
    <div class="table-responsive">

        <table class="table mt-5">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Wilayah</th>
                    <th>Alamat Detail</th>
                    <th>Agama</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_customer as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->wilayah->nama }}</td>
                        <td>{{ $item->alamat_detail }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
