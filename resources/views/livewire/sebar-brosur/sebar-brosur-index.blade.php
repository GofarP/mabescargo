<div class="card">

    <form action="{{ route('sebar_brosur_print') }}" method="POST" target="_blank">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <label for="mulai_dari">Mulai Dari</label>
                <input type="date" class="form-control" name="mulai_dari">
            </div>
            <div class="col-md-5">
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
    <div class="d-flex flex-column align-items-end mt-5">
        <input type="text" class="form-control w-25 w-md-25 mb-2" wire:model.debounce.300ms="search"
            placeholder="Search...">
        <a href="{{ route('sebarbrosur.create') }}" class="btn btn-primary w-auto">Tambah Sebar Brosur</a>
    </div>

    <!-- Table Section -->
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
                    <th>Aksi</th>
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
                        <td>{{ $item->no_telp    }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->pernah_pakai_ekspedisi }}</td>
                        <td>{{ $item->nama_ekspedisi }}</td>
                        <td>{{ number_format($item->biaya) }}</td>
                        <td>{{ $item->kenal_mbs_cargo }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <div class="d-flex">
                                <!-- Add margin-end (me-2) -->
                                <form action="{{ route('sebarbrosur.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('sebarbrosur.edit', $item->id) }}"
                                        class="btn btn-warning me-2">Edit</a>

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
            {{ $data_sebar_brosur->links() }}
        </div>
    </div>
</div>
