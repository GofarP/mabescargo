<div class="card">
    <!-- Search and Button Section -->
    <div class="d-flex flex-column align-items-end mt-3">
        <input type="text" class="form-control w-25 w-md-25 mb-2" placeholder="Search..." wire:model.debounce.300ms="search">
        <a href="{{ route('datavendor.create') }}" class="btn btn-primary w-auto">Tambah Kontak</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Bank</th>
                    <th>Penanggung Jawab</th>
                    <th>No Rekening</th>
                    <th>No Telpon</th>
                    <th>Wilayah</th>
                    <th>Alamat</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_vendor as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{$item->bank}}</td>
                        <td>{{$item->penanggung_jawab}}</td>
                        <td>{{$item->no_rekening}}</td>
                        <td>{{$item->no_telp}}</td>
                        <td>{{$item->wilayah->nama}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{number_format($item->harga)}}</td>
                        <td></td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('datavendor.edit',$item->id)}}" class="btn btn-warning me-2">Edit</a> <!-- Add margin-end (me-2) -->
                                <form action="{{ route('datavendor.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="float-end">
            {{ $data_vendor->links() }}
        </div>


    </div>
</div>
