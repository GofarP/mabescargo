@extends('master.masterdashboard')
@section('title', 'Cabang Edit')
@section('main-title')
    <h3>Edit Cabang</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('cabang.update',$cabang->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$cabang->nama}}">
                    @error('nama')
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
