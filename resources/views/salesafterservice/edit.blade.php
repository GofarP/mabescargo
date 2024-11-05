@extends('master.masterdashboard')
@section('title', 'Sales After Service Edit')
@section('main-title')
    <h3>Edit Sales After Service</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('salesafterservice.update',$salesafterservice->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$salesafterservice->tanggal}}" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{$salesafterservice->tanggal_masuk}}" name="tanggal_masuk" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_done">Tanggal Done</label>
                    <input type="date" class="form-control @error('tanggal_done') is-invalid @enderror" value="{{$salesafterservice->tanggal_done}}" name="tanggal_done" required>
                    @error('tanggal_done')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pesanan_mbs_cargo_id">Pilih Stt</label>
                    <select name="pesanan_mbs_cargo_id" id="pesanan_mbs_cargo_id" class="form-control js-example-basic-single required>
                        <option value="">Pilih Stt</option>
                        @foreach ($data_pesanan_mbs as $item)
                            <option value="{{$item->id}}"{{$salesafterservice->pesanan_mbs_cargo_id == $item->id ? 'selected' : ''}}>{{$item->stt}}</option>
                        @endforeach
                    </select>
                    @error('pesanan_mbs_cargo_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"  cols="30" rows="10" required>{{$salesafterservice->keterangan}}</textarea>
                </div>

                <div class="form-group">
                    <label for="kendala">Kendala</label>
                    <textarea name="kendala" id="kendala" class="form-control"  cols="30" rows="10" required>{{$salesafterservice->kendala}}</textarea>
                </div>

                <div class="form-group">
                    <label for="kritik_saran">Kritik & Saran </label>
                    <textarea name="kritik_saran" id="kritik_saran" class="form-control"  cols="30" rows="10" required>{{$salesafterservice->kritik_saran}}</textarea>
                </div>

                <div class="form-group">
                    <label for="tingkat_kepuasan">Tingkat Kepuasan </label>
                    <input type="number" name="tingkat_kepuasan" value="{{$salesafterservice->tingkat_kepuasan}}" id="tingkat_kepuasan" class="form-control" required>
                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
