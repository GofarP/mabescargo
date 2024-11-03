<div class="card">
    <!-- Search and Button Section -->
    <div class="d-flex flex-column align-items-end mt-3">
        <input type="text" class="form-control w-25 w-md-25 mb-2" wire:model.debounce.300ms="search" placeholder="Search...">
        <a href="{{ route('wilayah.create') }}" class="btn btn-primary w-auto">Tambah Wilayah</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tingkat Wilayah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_wilayah as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->tingkatanwilayah->nama}}</td>
                        <td>
                            <div class="d-flex ">
                                <a class="btn btn-warning me-2" href="{{route('wilayah.edit',$item->id)}}">Edit</a>
                                <form action="{{route('wilayah.destroy',$item->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            {{ $data_wilayah->links() }}
        </div>
    </div>
</div>
