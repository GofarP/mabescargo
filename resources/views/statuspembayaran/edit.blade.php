@extends('master.masterdashboard')
@section('title', 'Status Pembayaran Edit')
@section('main-title')
    <h3>Edit Status Pembayaran</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('statuspembayaran.update',$statuspembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$statuspembayaran->nama}}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-edit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
