<div class="card ">

    <form action="{{ route('followup_customer_lama_print') }}" method="POST" target="_blank">
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
                <label for="karyawan_id">Karyawan</label>
                <select name="karyawan_id" id="karyawan_id" class="form-control js-example-basic-single">
                    <option value="semua">Semua</option>
                    @foreach ($data_karyawan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col" wire:ignore>
                <label for="tipe_customer_id">Tipe Customer</label>
                <select name="tipe_customer_id" id="tipe_customer_id" class="form-control js-example-basic-single">
                    <option value="semua">Semua</option>
                    @foreach ($data_tipe_customer as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col" wire:ignore>
                <label for="kategori_customer_id">Kategori Customer</label>
                <select name="kategori_customer_id" id="kategori_customer_id" class="form-control js-example-basic-single">
                    <option value="semua">Semua</option>
                    @foreach ($data_kategori_customer as $item)
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
        <a href="{{ route('followupcustomerlama.create') }}" class="btn btn-primary w-auto">Tambah Followup Customer Lama</a>
    </div>

    <!-- Table Section -->
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_followup_customer_lama as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->customerlama->nama ?? '-' }}</td>
                        <td>{{$item->customerlama->no_telp}}</td>
                        <td>{!! $item->respon !!}</td>
                        <td>{!! $item->kendala !!}</td>
                        <td>{!! $item->karyawan->nama !!}</td>
                        <td>{{ $item->kategoricustomer->nama }}</td>
                        <td>{{ $item->tipecustomer->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->terakhirkirim)->format('d-m-Y') }}</td>
                        <td>{{$item->jumlah_kirim}}</td>

                        <td>
                            <form action="{{ route('followupcustomerlama.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('followupcustomerlama.edit', $item->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="float-end">
            {{ $data_followup_customer_lama->links() }}
        </div>
    </div>
</div>
