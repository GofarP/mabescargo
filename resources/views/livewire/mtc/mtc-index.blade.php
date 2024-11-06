<div class="card">
    <!-- Search and Button Section -->
    <div class="d-flex flex-column align-items-end mt-3">
        <input type="text" class="form-control w-25 w-md-25 mb-2" placeholder="Search...">
        <a href="{{ route('mtc.create') }}" class="btn btn-primary w-auto">Tambah Mtc</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Update</th>
                    <th>Status Manifes</th>
                    <th>Stt</th>
                    <th>Resi</th>
                    <th>Nama Penerima</th>
                    <th>Kota Tujuan</th>
                    <th>Vendor</th>
                    <th>Asal Tujuan</th>
                    <th>Tanggal Jalan</th>
                    <th>Estimasi</th>
                    <th>Keterangan</th>
                    <th>Penerima</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_mtc as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_update)->format('d-m-Y') }}</td>
                        <td>{{ $item->statusmanifes->nama }}</td>
                        <td>{{ $item->pesananmbs->stt }}</td>
                        <td>{{ $item->pesananmbs->resi }}</td>
                        <td>{{ $item->pesananmbs->resi }}</td>
                        <td>{{ $item->nama_penerima }}</td>
                        <td>{{ $item->kota_tujuan }}</td>
                        <td>{{ $item->vendor->nama }}</td>
                        <td>{{ $item->asal_tujuan }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_jalan)->format('d-m-Y') }}</td>
                        <td>{{ $item->estimasi }}</td>
                        <td>{{ $item->estimasi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->penerima }}</td>
                        <td>
                            @if ($item->foto)
                                <img src="foto-mtc/.{{ $item->foto }}" width="100px" height="100px">
                            @else
                                <p>Gambar Tidak Ditemukan</p>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('cabang.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                <!-- Add margin-end (me-2) -->
                                <form action="{{ route('cabang.destroy', $item->id) }}" method="POST">
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
            {{ $data_cabang->links() }}
        </div>


    </div>
</div>
