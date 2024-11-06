@extends('master.masterdashboard')
@section('title', 'Vendor Edit')
@section('main-title')
    <h3>Edit Vendor</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('datavendor.update', $datavendor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ $datavendor->nama }}" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" name="bank" class="form-control @error('bank') is-invalid @enderror"
                        value="{{ $datavendor->bank }}" required>
                    @error('bank')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="penanggung_jawab">Penanggung Jawab</label>
                    <input type="text" name="penanggung_jawab"
                        class="form-control @error('penanggung_jawab') is-invalid @enderror"
                        value="{{ $datavendor->penanggung_jawab }}" required>
                    @error('penanggung_jawab')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_rekening">No Rekening</label>
                    <input type="text" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror"
                        value="{{ $datavendor->no_rekening }}" required>
                    @error('no_rekening')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                        value="{{ $datavendor->no_telp }}" required>
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="wilayah_id">Wilayah</label>
                    <select name="wilayah_id" id="wilayah_id" class="form-control js-example-basic-single" required>
                        <option value="">Pilih Wilayah</option>
                        @foreach ($data_wilayah as $item)
                            <option value="{{ $item->id }}"{{ $datavendor->wilayah_id == $item->id }}>
                                {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('wilayah_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        value="{{ $datavendor->alamat }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                        value="{{ $datavendor->harga }}" required>
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
