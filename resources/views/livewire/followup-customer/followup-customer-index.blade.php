<div class="card">

    <form action="{{ route('followup_customer_print') }}" method="POST" target="_blank">
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

            <div class="col" wire:ignore>
                <label for="jenis_kontak_id">Jenis Kontak</label>
                <select name="jenis_kontak_id" id="jenis_kontak_id" class="form-control js-example-basic-single">
                    <option value="semua">Semua</option>
                    @foreach ($data_jenis_kontak as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col" wire:ignore>
                <label for="karyawan_id">Karyawan</label>
                <select name="karyawan_id" id="karyawan_id" class="form-control js-example-basic-single">
                    <option value="semua">Semua</option>
                    @foreach ($data_karyawan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
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
        <a href="{{ route('followupcustomer.create') }}" class="btn btn-primary w-auto">Tambah Followup Customer</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">


        <table class="table mt-3">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Karyawan</th>
                    <th>No Telp</th>
                    <th>Harga Barang</th>
                    <th>Harga Kendaraan</th>
                    <th>Berat Minimal</th>
                    <th>Keterangan Harga</th>
                    <th>Budget</th>
                    <th>Daerah Asal</th>
                    <th>Daerah Tujuan</th>
                    <th>Kontak</th>
                    <th>Barang</th>
                    <th>Kendala</th>
                    <th>Tanggapan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_followup_customer as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->nama ?? '-' }}</td>
                        <td>{{ $item->karyawan->nama ?? '-' }}</td>
                        <td>{{ $item->no_telp ?? '-' }}</td>
                        <td>{{ number_format($item->harga_barang) ?? '-' }}</td>
                        <td>{{ number_format($item->harga_kendaraan) ?? '-' }}</td>
                        <td>{{ $item->berat_minimal ?? '-' }}</td>
                        <td>{!! $item->keterangan_harga ?? '-' !!}</td>
                        <td>{{ number_format($item->budget) ?? '-' }}</td>
                        <td>{{ $item->wilayahasal->nama ?? '-' }}</td>
                        <td>{{ $item->wilayahtujuan->nama ?? '-' }}</td>
                        <td>{{ $item->kontak->nama }}</td>
                        <td>{!! $item->barang ?? '-' !!}</td>
                        <td>{!! $item->kendala ?? '-' !!}</td>
                        <td>{!! $item->tanggapan ?? '-' !!}</td>
                        <td>{{ $item->status ?? '-' }}</td>
                        <td>
                            <form action="{{ route('followupcustomer.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('followupcustomer.edit', $item->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="float-end">
            {{ $data_followup_customer->links() }}
        </div>
    </div>
</div>
