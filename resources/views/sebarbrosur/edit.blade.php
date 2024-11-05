@extends('master.masterdashboard')
@section('title', 'Sebar Brosur Edit')
@section('main-title')
    <h3>Edit Sebar Brosur</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('sebarbrosur.update',$sebarbrosur->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{$sebarbrosur->tanggal}}">
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_toko">Nama Toko</label>
                    <input type="text" name="nama_toko" class="form-control @error('nama') is-invalid @enderror" value="{{$sebarbrosur->nama_toko}}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="karyawan_id">Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror js-example-basic-single">
                        <option value="">Pilih Karyawan</option>
                        @foreach ($data_karyawan as $item)
                            <option value="{{$item->id}}" {{$sebarbrosur->karyawan_id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                        @endforeach
                    </select>
                    @error('karyawan_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$sebarbrosur->nama}}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{$sebarbrosur->no_telp}}">
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$sebarbrosur->alamat}}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$sebarbrosur->alamat}}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="pernah_pakai_ekspedisi">Pernah Pakai Ekspedisi</label>
                    <textarea name="pernah_pakai_ekspedisi" id="" cols="30" rows="10" class="form-control">{{$sebarbrosur->pernah_pakai_ekspedisi}}</textarea>
                    @error('pernah_pakai_ekspedisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="nama_ekspedisi">Nama Ekspedisi</label>
                    <textarea name="nama_ekspedisi" id="" cols="30" rows="10" class="form-control">{{$sebarbrosur->nama_ekspedisi}}</textarea>
                    @error('nama_ekspedisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="number" name="biaya" class="form-control @error('biaya') is-invalid @enderror" value="{{$sebarbrosur->biaya}}">
                    @error('biaya')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="kenal_mbs_cargo">Kenal Mbs Cargo</label>
                    <textarea name="kenal_mbs_cargo" id="" cols="30" rows="10" class="form-control">{{$sebarbrosur->kenal_mbs_cargo}}</textarea>
                    @error('kenal_mbs_cargo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{$sebarbrosur->keterangan}}</textarea>
                    @error('keterangan')
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
