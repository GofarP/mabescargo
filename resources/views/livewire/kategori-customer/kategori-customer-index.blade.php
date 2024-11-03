<div class="card">

    <!-- Search and Button Section -->
    <div class="d-flex flex-column align-items-end mt-5">
        <input type="text" class="form-control w-25 w-md-25 mb-2" wire:model.debounce.300ms="search"
            placeholder="Search...">
        <a href="{{ route('kategoricustomer.create') }}" class="btn btn-primary w-auto">Tambah Kategori Customer</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">


        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_kategori_customer as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('kategoricustomer.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                <!-- Add margin-end (me-2) -->
                                <form action="{{ route('kategoricustomer.destroy', $item->id) }}" method="POST">
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
            {{ $data_kategori_customer->links() }}
        </div>
    </div>
</div>
