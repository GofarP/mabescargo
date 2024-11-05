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
        <h3>Laporan Sales After Service</h3>
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
                    <th>STT</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Done</th>
                    <th>Keterangan</th>
                    <th>Kendala</th>
                    <th>Kritik & Saran</th>
                    <th>TIngkat Kepuasan</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_sales_after_service as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->pesananmbscargo->stt }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_done)->format('d-m-Y') }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->kendala }}</td>
                        <td>{{ $item->kritik_saran }}</td>
                        <td>
                            @if ($item->tingkat_kepuasan == 1)
                                <i class="fas fa-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 2)
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 3)
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 4)
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 5)
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                                <i class="fas fa-star" style="color: red"></i>
                            @endif

                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('kontak.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                <!-- Add margin-end (me-2) -->
                                <form action="{{ route('kontak.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="float-end">
            {{ $data_kontak->links() }}
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
