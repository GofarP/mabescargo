@extends('master.masterdashboard')
@section('title', 'Follow Customer Tambah')
@section('main-title')
    <h3>Tambah Followup Customer</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('followupcustomer.update',$followupcustomer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$followupcustomer->tanggal}}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$followupcustomer->nama}}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                name="no_telp" value="{{$followupcustomer->no_telp}}"  required>
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="harga_barang">Harga Barang</label>
                            <input type="number" class="form-control @error('harga_barang') is-invalid @enderror"
                                name="harga_barang" value="{{$followupcustomer->harga_barang}}" required>
                            @error('harga_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="harga_kendaraan">Harga Kendaraan</label>
                            <input type="number" class="form-control @error('harga_kendaraan') is-invalid @enderror"
                                name="harga_kendaraan" value="{{$followupcustomer->harga_kendaraan}}" required>
                            @error('harga_kendaraan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="berat_minimal">Berat Minimal</label>
                            <input type="number" class="form-control @error('berat_minimal') is-invalid @enderror"
                                name="berat_minimal" value="{{$followupcustomer->berat_minimal}}" required>
                            @error('berat_minimal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="budget">Budget</label>
                            <input type="number" class="form-control @error('budget') is-invalid @enderror" name="budget" value="{{$followupcustomer->budget}}" required>
                            @error('budget')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="wilayah_asal_id">Wilayah Asal</label>
                            <select name="wilayah_asal_id" id="wilayah_asal_id" class="form-control @error('wilayah_asal_id') is-invalid @enderror js-example-basic-single" required>
                                <option value="">Pilih Wilayah Asal</option>
                                @foreach ($data_wilayah as $item)
                                    <option value="{{ $item->id }}"{{$followupcustomer->wilayah_asal_id==$item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('wilayah_asal_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-5">
                        <div class="form-group">
                            <label for="wilayah_tujuan_id">Wilayah Tujuan</label>
                            <select name="wilayah_tujuan_id" id="wilayah_tujuan_id" class="form-control @error('wilayah_tujuan_id') is-invalid @enderror js-example-basic-single" required>
                                <option value="">Pilih Wilayah Tujuan</option>
                                @foreach ($data_wilayah as $item)
                                    <option value="{{ $item->id }}" {{$followupcustomer->wilayah_tujuan_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('wilayah_tujuan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="kontak_id">Kontak</label>
                            <select name="kontak_id" id="kontak_id" class="form-control @error('kontak_id') is-invalid @enderror js-example-basic-single" required>
                                <option value="">Pilih Kontak</option>
                                @foreach ($data_kontak as $item)
                                    <option value="{{ $item->id }}" {{$followupcustomer->kontak_id==$item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('kontak_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror js-example-basic-single" required>
                                <option value="">Pilih Status</option>
                                <option value="selesai" {{$followupcustomer->status=='selesai' ? 'selected' : ''}}>Selesai</option>
                                <option value="belum selesai" {{$followupcustomer->status=='belum selesai' ? 'selected' : ''}}>Belum Selesai</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="karyawan_id">Karyawan</label>
                            <select name="karyawan_id" name="karyawan_id" id="karyawan_id" class="form-control @error('karyawan') is-invalid @enderror js-example-basic-single" required>
                                <option value="">Pilih Karyawan</option>
                                @foreach ($data_karyawan as $item)
                                    <option value="{{ $item->id }}" {{$followupcustomer->karyawan_id==$item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('karyawan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="keterangan_harga">Keterangan Harga</label>
                            <p>
                                <input id="keterangan_harga" type="hidden" class="@error('keterangan_harga') is-invalid @enderror" name="keterangan_harga" value="{{$followupcustomer->keterangan_harga}}" required/>
                                <trix-editor input="keterangan_harga" class="trix-content h-5" required></trix-editor>
                            </p>

                            @error('keterangan_harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="barang">Barang</label>
                            <p>
                                <input id="barang" type="hidden" class="@error('barang') is-invalid @enderror" name="barang" value="{{$followupcustomer->barang}}" required/>
                                <trix-editor input="barang" class="trix-content h-5" required></trix-editor>
                            </p>

                            @error('barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="kendala">kendala</label>
                            <p>
                                <input id="kendala" type="hidden" class="@error('kendala') is-invalid @enderror" name="kendala" value="{{$followupcustomer->kendala}}" required/>
                                <trix-editor input="kendala" class="trix-content h-5" required></trix-editor>
                            </p>

                            @error('kendala')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <p>
                                <input id="tanggapan" type="hidden" class="@error('tanggapan') is-invalid @enderror" name="tanggapan" value="{{$followupcustomer->tanggapan}}" required/>
                                <trix-editor input="tanggapan" class="trix-content h-5" required></trix-editor>
                            </p>

                            @error('tanggapan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
