<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Followup Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* General table styling */
        table {
            font-size: 8pt;
            width: 100%;
            border-collapse: collapse;
        }


        td {
            padding: 2px;
            font-size: 9pt;
            word-wrap: break-word;
        }

        /* Print-specific styles */
        @media print {
            .media-print-button {
                display: none;
            }

            @page {
                size: A4 landscape;
                margin: 10px;
            }

            body {
                margin: 0;
                font-size: 9pt;
            }

            table {
                width: 100%;
                border: 1px solid #000;
            }

            /* Force background color in print */
            thead {
                background-color: #f0f0f0 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            /* Remove Bootstrap's extra padding */
            .table th,
            .table td {
                padding: 1px;
            }
        }
    </style>
</head>

<body>
    <h2 class="text-center mt-4">Laporan Followup Customer Lama</h2>
    <h4 class="text-center mt-3">{{ \Carbon\Carbon::parse($mulai_dari)->format('d/m/Y') }} -
        {{ \Carbon\Carbon::parse($sampai_dengan)->format('d/m/Y') }}</h4>

    <button class="btn btn-success media-print-button" onclick="window.print()">Print</button>

    <div class="table-responsive text-nowrap mt-3">


        <table class="table mt-3">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kustomer</th>
                    <th>No Telp</th>
                    <th>Respon</th>
                    <th>Kendala</th>
                    <th>Marketing</th>
                    <th>Kategori Pelanggan</th>
                    <th>Tipe Pelanggan</th>
                    <th>Terakhir Kirim</th>
                    <th>Jumlah Kirim</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_followup_customer_lama as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->customerlama->nama ?? '-' }}</td>
                        <td>{{ $item->customerlama->no_telp }}</td>
                        <td>{!! $item->respon !!}</td>
                        <td>{!! $item->kendala !!}</td>
                        <td>{!! $item->karyawan->nama !!}</td>
                        <td>{{ $item->kategoricustomer->nama }}</td>
                        <td>{{ $item->tipecustomer->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->terakhirkirim)->format('d-m-Y') }}</td>
                        <td>{{ $item->jumlah_kirim }}</td>
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
