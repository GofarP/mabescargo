@extends('master.masterdashboard')
@section('title', 'Sales After Service Tambah')
@section('main-title')
    <h3>Tambah Sales After Service</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('salesafterservice.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{old('tanggal')}}" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{old('tanggal_masuk')}}" name="tanggal_masuk" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="tanggal_done">Tanggal Done</label>
                    <input type="date" class="form-control @error('tanggal_done') is-invalid @enderror" value="{{old('tanggal_done')}}" name="tanggal_done" required>
                    @error('tanggal_done')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="pesanan_mbs_cargo_id">Pilih Stt</label>
                    <select name="pesanan_mbs_cargo_id" id="pesanan_mbs_cargo_id" class="form-control js-example-basic-single " required>
                        <option value="">Pilih Stt</option>
                        @foreach ($data_pesanan_mbs as $item)
                            <option value="{{$item->id}}">{{$item->stt}}</option>
                        @endforeach
                    </select>
                    @error('pesanan_mbs_cargo_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" value="{{old('keterangan')}}" cols="30" rows="10" required></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="kendala">Kendala</label>
                    <textarea name="kendala" id="kendala" class="form-control" value="{{old('kendala')}}" cols="30" rows="10" required></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="kritik_saran">Kritik & Saran </label>
                    <textarea name="kritik_saran" class="form-control" id="kritik_saran" value="{{old('kritik_saran')}}" cols="30" rows="10" required></textarea>
                </div>

                <div class="form-group mb-4">
                    <label for="tingkat_kepuasan">Tingkat Kepuasan </label>
                    <input type="number" name="tingkat_kepuasan" value="{{old('tingkat_kepuasan')}}" id="tingkat_kepuasan" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
