@extends('master.masterdashboard')
@section('title', 'Followup Customer Lama Edit')
@section('main-title')
    <h3>Edit Followup Customer Lama</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('followupcustomerlama.update',$followupcustomerlama->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-5">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ $followupcustomerlama->tanggal }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="customer">Customer</label>
                    <select name="customer_lama_id" class="form-control js-example-basic-single @error('customer_lama_id') is-invalid @enderror" required>
                        <option value="">Pilih</option>
                        @foreach ($data_customer_lama as $item)
                            <option value="{{ $item->id }}"{{$followupcustomerlama->customer_lama_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('customer_lama_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="respon">Respon</label>
                    <input id="respon" type="hidden" class="@error('respon') is-invalid @enderror" name="respon"
                        value="{{$followupcustomerlama->respon}}" required />
                    <trix-editor input="respon" class="trix-content h-5" required></trix-editor>

                    @error('respon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="kendala">Kendala</label>
                    <input id="kendala" type="hidden" class="@error('kendala') is-invalid @enderror" name="kendala"
                        value="{{$followupcustomerlama->kendala}}" required />
                    <trix-editor input="kendala" class="trix-content h-5" required></trix-editor>

                    @error('kendala')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="karyawan_id">Karyawan</label>
                    <select name="karyawan_id" class="form-control js-example-basic-single @error('karyawan_id') is-invalid @enderror" required>
                        <option value="">Pilih</option>
                        @foreach ($data_karyawan as $item)
                            <option value="{{ $item->id }}" {{$followupcustomerlama->karyawan_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="kategori_customer_id">Kategori Pelanggan</label>
                    <select name="kategori_customer_id" class="form-control js-example-basic-single @error('kategori_customer_id') is-invalid @enderror" required>
                        <option value="">Pilih</option>
                        @foreach ($data_kategori_pelanggan as $item)
                            <option value="{{ $item->id }}" {{$followupcustomerlama->kategori_customer_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_customer_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="tipe_customer_id">Tipe Pelanggan</label>
                    <select name="tipe_customer_id" class="form-control js-example-basic-single @error('tipe_customer_id') is-invalid @enderror" required>
                        <option value="">Pilih</option>
                        @foreach ($data_tipe_pelanggan as $item)
                            <option value="{{ $item->id }}" {{$followupcustomerlama->tipe_customer_id == $item->id ? 'selected' : ''}}> {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('tipe_customer_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="karyawan_id">Karyawan</label>
                    <select name="karyawan_id" class="form-control js-example-basic-single @error('karyawan_id') is-invalid @enderror" required>
                        <option value="">Pilih</option>
                        @foreach ($data_karyawan as $item)
                            <option value="{{ $item->id }}" {{$followupcustomerlama->karyawan_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="terakhir_kirim">Terakhir Kirim</label>
                     <input type="date" name="terakhir_kirim" id="terakhir_kirim" class="form-control" required value="{{$followupcustomerlama->terakhir_kirim}}">

                    @error('terakhir_kirim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <label for="jumlah_kirim">Jumlah Kirim</label>
                     <input type="number" name="jumlah_kirim" id="jumlah_kirim" class="form-control" value="{{$followupcustomerlama->jumlah_kirim}}" required>
                    @error('jumlah_kirim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="form-group mt-3">
                    <button class="form-control btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
