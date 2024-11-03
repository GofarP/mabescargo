@extends('master.masterdashboard')
@section('title', 'Customer Edit')
@section('main-title')
    <h3>Edit Customer</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                        value="{{ $customer->tanggal }}">
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ $customer->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ $customer->email }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="no_telp">No Telp</label>
                    <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                        value="{{ $customer->no_telp }}">
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="wilayah_id">Wilayah</label>
                    <select name="wilayah_id"
                        class="form-control js-example-basic-single @error('wilayah_id') is-invalid @enderror">
                        <option value="">Pilih Wilayah</option>
                        @foreach ($data_wilayah as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $customer->wilayah_id ? 'selected' : '' }}>
                                {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('wilayah_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="alamat_detail">Alamat Detail</label>
                    <input type="text" name="alamat_detail"
                        class="form-control @error('alamat_detail') is-invalid @enderror"
                        value="{{ $customer->alamat_detail }}">
                    @error('alamat_detail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama"
                        class="form-control @error('agama') is-invalid @enderror js-exmaple-basic-single">
                        <option value="">Pilih Agama</option>
                        <option value="islam" {{ $customer->agama == 'islam' ? 'selected' : '' }}>Islam</option>
                        <option value="kristen katolik" {{ $customer->agama == 'kristen katolik' ? 'selected' : '' }}>
                            Kristen Katolik</option>
                        <option value="kristen protestan" {{ $customer->agama == 'kristen protestan' ? 'selected' : '' }}>
                            Kristen Protestan</option>
                        <option value="hindu" {{ $customer->agama == 'hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="buddha" {{ $customer->agama == 'buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="khonghucu" {{ $customer->agama == 'khonghucu' ? 'selected' : '' }}>Khonghucu
                        </option>

                    </select>
                    @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                        value="{{ $customer->tempat_lahir }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        name="tanggal_lahir" value="{{ $customer->tanggal_lahir }}">
                    @error('tanggal_lahir')
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
