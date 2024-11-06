@extends('master.masterdashboard')
@section('title', 'Daftar Harga Tambah')
@section('main-title')
    <h3>Tambah Daftar Harga</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('daftarharga.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="wilayah_asal_id">Wilayah Asal</label>
                    <select name="wilayah_asal_id" class="form-control js-example-basic-single" id="wilayah_asal_id" required>
                        <option value="">Pilih Wilayah Asal</option>
                        @foreach ($data_wilayah as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('wilayah_asal_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="wilayah_tujuan_id">Wilayah Tujuan</label>
                    <select name="wilayah_tujuan_id" class="form-control js-example-basic-single" id="wilayah_tujuan_id" required>
                        <option value="">Pilih Wilayah Tujuan</option>
                        @foreach ($data_wilayah as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('wilayah_tujuan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="harga_asal">Harga Asal</label>
                    <input type="number" name="harga_asal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="jalur_id">Jalur</label>
                    <select name="jalur_id" class="form-control js-example-basic-single" id="jalur_id" required>
                        <option value="">Pilih Jalur</option>
                        @foreach ($data_jalur as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('jalur_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group mt-3">
                    <button class="form-control btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
