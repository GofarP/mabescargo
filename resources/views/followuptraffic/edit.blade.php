@extends('master.masterdashboard')
@section('title', 'Followup Traffic Edit')
@section('main-title')
    <h3>Edit Followup Traffic</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('followuptraffic.update',$followuptraffic->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="date"
                        class="form-control @error('tanggal') is-invalid @enderror" value="{{$followuptraffic->tanggal}}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="followupup_customer_id">Customer</label>
                    <select name="followupup_customer_id" id="followup_customer_id"
                        class="form-control @error('followup_customer_id') is-invalid @enderror js-example-basic-single" required>
                        <option value="">Pilih Customer</option>
                        @foreach ($data_followup_customer as $item)
                            <option value="{{ $item->id }}"{{$followuptraffic->followup_customer_id==$item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('followup_up_customer_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_telp">No telp</label>
                    <input type="number" value="{{$followuptraffic->no_telp}}" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" required>
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="respon">Respon</label>
                    <input id="respon"  type="hidden" class="@error('respon') is-invalid @enderror" name="respon"
                        value="{{$followuptraffic->respon}}" required />
                    <trix-editor input="respon" class="trix-content h-5" required></trix-editor>
                    @error('respon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kendala">Kendala</label>
                    <input id="kendala"  type="hidden" class="@error('kendala') is-invalid @enderror" name="kendala"
                        value="{{$followuptraffic->kendala}}" required />
                    <trix-editor input="kendala" class="trix-content h-5" required></trix-editor>
                    @error('kendala')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="barang">Barang</label>
                    <input id="barang" type="text" class="@error('barang') is-invalid @enderror form-control" name="barang"
                        value="{{ $followuptraffic->barang }}" required />
                    @error('respon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="wilayah_asal_id">Wilayah Asal</label>
                    <select name="wilayah_asal_id" id="wilayah_asal_id"
                        class="form-control @error('wilayah_asal_id') is-invalid @enderror js-example-basic-single" required>
                        <option value="">Pilih Wilayah Asal</option>
                        @foreach ($data_wilayah as $item)
                            <option value="{{ $item->id }}"{{$followuptraffic->wilayah_asal_id==$item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="wilayah_tujuan_id">Wilayah Tujuan_id</label>
                    <select name="wilayah_tujuan_id" id="wilayah_tujuan_id"
                        class="form-control @error('wilayah_tujuan_id') is-invalid @enderror js-example-basic-single" required>
                        <option value="">Pilih Wilayah Tujuan</option>
                        @foreach ($data_wilayah as $item)
                            <option value="{{ $item->id }}" {{$followuptraffic->wilayah_tujuan_id==$item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="budget">Budget</label>
                    <input type="number" name="budget" id="budget" value="{{$followuptraffic->budget}}" class="form-control @error('budget') is-invalid @enderror " required>
                </div>


                <div class="form-group mb-3">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="number" name="harga_barang" id="harga_barang" value="{{$followuptraffic->harga_barang}}"
                        class="form-control @error('harga_barang') is-invalid @enderror "
                        required>
                </div>

                <div class="form-group">
                    <label for="harga_kendaraan">Harga Kendaraan</label>
                    <input type="number" name="harga_kendaraan" id="harga_kendaraan" value="{{$followuptraffic->harga_kendaraan}}" class="form-control @error('harga_kendaraan') is-invalid @enderror" required>
                </div>

                <div class="form-group">
                    <label for="karyawan_id">Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id"
                        class="form-control @error('karyawan_id') is-invalid @enderror js-example-basic-single" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach ($data_karyawan as $item)
                            <option value="{{ $item->id }}" {{$followuptraffic->karyawan_id == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
