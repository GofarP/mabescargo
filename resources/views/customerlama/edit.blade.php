@extends('master.masterdashboard')
@section('title', 'Customer Tambah')
@section('main-title')
    <h3>Tambah Customer</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('customerlama.update', $customerlama->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ $customerlama->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ $customerlama->email }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="no_telp">No Telp</label>
                    <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                        value="{{ $customerlama->no_telp }}">
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="organisasi">Organisasi</label>
                    <input type="text" name="organisasi" class="form-control @error('organisasi') is-invalid @enderror"
                        value="{{ $customerlama->organisasi}}">
                    @error('organisasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="form-group mb-3">
                    <label for="alamat_detail">Alamat Detail</label>
                    <input type="text" name="alamat_detail"
                        class="form-control @error('alamat_detail') is-invalid @enderror"
                        value="{{ $customerlama->alamat_detail }}">
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
                        <option value="islam" {{ $customerlama->agama == 'islam' ? 'selected' : '' }}>Islam</option>
                        <option value="kristen katolik" {{ $customerlama->agama == 'kristen katolik' ? 'selected' : '' }}>
                            Kristen Katolik</option>
                        <option value="kristen protestan"
                            {{ $customerlama->agama == 'kristen protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                        <option value="hindu" {{ $customerlama->agama == 'hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="buddha" {{ $customerlama->agama == 'buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="khonghucu" {{ $customerlama->agama == 'khonghucu' ? 'selected' : '' }}>Khonghucu
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
                        value="{{ $customerlama->tempat_lahir }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        name="tanggal_lahir" value="{{ $customerlama->tanggal_lahir }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="wilayah_id">Wilayah</label>
                    <select name="wilayah_id" id=""
                        class="form-control js-example-basic-single @error('wilayah_id') is-invalid @enderror">
                        @foreach ($data_wilayah as $item)
                            <option value="">Pilih Wilayah</option>
                            @foreach ($data_wilayah as $item)
                                <option value="{{ $item->id }}"
                                    {{ $customerlama->wilayah_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    @error('wilayah_id')
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
