@extends('master.masterdashboard')
@section('title', 'Wilayah Edit')
@section('main-title')
    <h3>Edit Wilayah</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('wilayah.update',$wilayah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{$wilayah->nama}}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tingkatan_wilayah_id">Tingkatan Wilayah</label>
                    <select class="js-example-basic-single form-control" name="tingkatan_wilayah_id">
                        <option value="">Pilih Tingkatan Wilayah</option>
                        @foreach ($data_tingkatan_wilayah as $item )
                            <option value="{{$item->id}}" {{$wilayah->tingkatan_wilayah_id==$item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('tingkatan_wilayah_id')
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
