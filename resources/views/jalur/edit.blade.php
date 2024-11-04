@extends('master.masterdashboard')
@section('title', 'Jalur Edit')
@section('main-title')
    <h3>Jalur Edit</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('jalur.update',$jalur->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$jalur->nama}}">
                    @error('nama')
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
