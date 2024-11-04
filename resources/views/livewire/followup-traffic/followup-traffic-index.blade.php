<div class="card">
    <form action="{{ route('followup_traffic_print') }}" method="POST" target="_blank">
        @csrf
        <div class="row">
            <div class="col">
                <label for="mulai_dari">Mulai Dari</label>
                <input type="date" class="form-control" name="mulai_dari" required>
            </div>
            <div class="col">
                <label for="sampai_dengan">Sampai Dengan</label>
                <input type="date" class="form-control" name="sampai_dengan">
            </div>

            <div class="col-12 col-md-2">
                <label for="">&nbsp;</label>
                <button type="submit" class="btn btn-primary form-control">
                    <i class='bx bxs-printer'></i> Print
                </button>
            </div>
        </div>
    </form>
    <!-- Search and Button Section -->
    <div class="d-flex flex-column align-items-end mt-3">
        <input type="text" class="form-control w-25 w-md-25 mb-2" wire:model.debounce.300ms="search" placeholder="Search...">
        <a href="{{ route('followuptraffic.create') }}" class="btn btn-primary w-auto">Tambah Followup Traffic</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Respon</th>
                    <th>Kendala</th>
                    <th>Barang</th>
                    <th>Wilayah Asal</th>
                    <th>Wilayah Tujuan</th>
                    <th>Harga Barang</th>
                    <th>Budget</th>
                    <th>Harga Kendaraan</th>
                    <th>Karyawan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_followup_traffic as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->followupcustomer->nama ?? '-' }}</td>
                        <td>{{ $item->no_telp ?? '-' }}</td>
                        <td>{!! $item->respon ?? '-' !!}</td>
                        <td>{!! $item->kendala ?? '-' !!}</td>
                        <td>{!! $item->barang ?? '-' !!}</td>
                        <td>{{ $item->wilayahasal->nama ?? '-' }}</td>
                        <td>{{ $item->wilayahtujuan->nama ?? '-' }}</td>
                        <td>{{ number_format($item->harga_barang) ?? '-' }}</td>
                        <td>{{ number_format($item->budget) ?? '-' }}</td>
                        <td>{{ number_format($item->harga_kendaraan) ?? '-' }}</td>
                        <td>{{ $item->karyawan->nama ?? '-' }}</td>

                        <td>
                            <div class="d-flex">
                                <a href="{{ route('followuptraffic.edit', $item->id) }}"
                                    class="btn btn-warning me-2">Edit</a> <!-- Add margin-end (me-2) -->
                                <form action="{{ route('followuptraffic.destroy', $item->id) }}" method="POST">
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
            {{ $data_followup_traffic->links() }}
        </div>


    </div>
</div>
