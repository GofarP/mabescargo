<div>
    <form action="{{ route('pesanan_mbs_print') }}" method="POST" target="_blank">
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
            <div class="col-md-5" wire:ignore>
                <label for="cabang_id">Cabang</label>
                <select name="cabang_id" id="cabang_id" class="form-control js-example-basic-single" required>
                    <option value="semua">Semua</option>
                    @foreach ($data_cabang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5" wire:ignore>
                <label for="karyawan_id">Karyawan</label>
                <select name="karyawan_id" id="karyawan_id" class="form-control js-example-basic-single" required>
                    <option value="semua">Semua</option>
                    @foreach ($data_karyawan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5" wire:ignore>
                <label for="status_pembayaran_id">Status Pembayaran</label>
                <select name="status_pembayaran_id" id="status_pembayaran_id" class="form-control js-example-basic-single" required>
                    <option value="semua">Semua</option>
                    @foreach ($data_status_pembayaran as $item)
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
        <a href="{{ route('pesananmbs.create') }}" class="btn btn-primary w-auto">Tambah Pesanan</a>
    </div>

    <!-- Table Section -->
    <div class="table-responsive text-nowrap mt-3">


        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Waktu Pesan</th>
                    <th>STT</th>
                    <th>Resi</th>
                    <th>Customer</th>
                    <th>Berat</th>
                    <th>Alamat Tujuan</th>
                    <th>Status Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Catatan Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($data_pesanan_mbs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{\Carbon\Carbon::parse($item->waktu_pesan)->format('d-m-Y')}}</td>
                        <td>{{ $item->stt }}</td>
                        <td>{{ $item->resi }}</td>
                        <td>{{$item->customer->nama}}</td>
                        <td>{{ $item->berat }}</td>
                        <td>{!! $item->alamat_detail_tujuan !!}</td>
                        <td>{{$item->statuspembayaran->nama}}</td>
                        <td>{{ $item->metodepembayaran->nama}}</td>
                        <td>{!! $item->catatan_barang !!}</td>
                        <td>
                            <form action="{{route('pesananmbs.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('pesananmbs.show',$item->id)}}" class="btn btn-primary">
                                    Resi
                                </a>

                                <a href="{{route('pesananmbs.edit',$item->id)}}" class="btn btn-warning">
                                    Edit
                                </a>

                                <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')">Hapus</button>
                            </form>
                        </td>
                @endforeach
            </tbody>

        </table>

        <div class="float-end">
            {{ $data_pesanan_mbs->links() }}
        </div>
    </div>
</div>
