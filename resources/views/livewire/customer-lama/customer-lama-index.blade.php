<div class="card">

    <!-- Search and Button Section -->
    <div class="d-flex flex-column align-items-end mt-5">
        <input type="text" class="form-control w-25 w-md-25 mb-2" wire:model.debounce.300ms="search"
            placeholder="Search...">
        <a href="{{ route('customerlama.create') }}" class="btn btn-primary w-auto">Tambah Customer Lama</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">


        <table class="table mt-3">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telp</th>
                    <th>Organisasi</th>
                    <th>Alamat Detail</th>
                    <th>Agama</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Wilayah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_customer_lama as $item )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->no_telpp}}</td>
                        <td>{{$item->organisasi}}</td>
                        <td>{{$item->alamat_detail}}</td>
                        <td>{{$item->agama}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y')}}</td>
                        <td>{{$item->tempat_lahir}}</td>
                        <td>{{$item->wilayah->nama}}</td>
                        <td>
                            <form action="{{route('customerlama.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('customerlama.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        <div class="float-end">
            {{$data_customer_lama->links()}}
        </div>
    </div>
</div>
