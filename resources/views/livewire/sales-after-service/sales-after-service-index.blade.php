<div class="card">
    <div class="d-flex flex-column align-items-end mt-3">
        <input type="text" class="form-control w-25 w-md-25 mb-2" placeholder="Search..."
            wire:model.debounce.300ms="search">
        <a href="{{ route('salesafterservice.create') }}" class="btn btn-primary w-auto">Tambah Sales After Service</a>
    </div>

    <!-- Table Section -->
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
                                <i class="bx bxs-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 2)
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 3)
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 4)
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                            @elseif ($item->tingkat_kepuasan == 5)
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                                <i class="bx bxs-star" style="color: red"></i>
                            @endif

                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('salesafterservice.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                <!-- Add margin-end (me-2) -->
                                <form action="{{ route('salesafterservice.destroy', $item->id) }}" method="POST">
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
            {{ $data_sales_after_service->links() }}
        </div>


    </div>
</div>
