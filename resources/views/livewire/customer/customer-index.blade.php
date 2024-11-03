<div class="card">

    <form action="{{route('customer_print')}}" method="POST" target="_blank">
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
        <a href="{{ route('customer.create') }}" class="btn btn-primary w-auto">Tambah Customer</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">


        <table class="table">
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
                    <th>Aksi</th>
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
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                <!-- Add margin-end (me-2) -->
                                <form action="{{ route('customer.destroy', $item->id) }}" method="POST">
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
            {{ $data_customer->links() }}
        </div>
    </div>
</div>
