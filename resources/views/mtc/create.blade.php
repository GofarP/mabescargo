@extends('master.masterdashboard')
@section('title', 'Tipe Customer Tambah')
@section('main-title')
    <h3>Tambah Mtc</h3>
@endsection
@section('content')
    <div class="card w-100">
        <div class="card-body">
            <form action="{{ route('mtc.store') }}" method="POST">
                @csrf
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal"><strong>Tanggal Update</strong><span class="text-danger">*</span>
                                </label>
                                <input type="date" id="tanggal" name="tanggal_update" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="status_manifes"><strong>Status Manifes</strong><span
                                        class="text-danger">*</span>
                                </label>
                                <select name="status_manifes_id" id="status_manifes_id"
                                    class="form-control js-example-basic-single" required>
                                    <option value="">Pilih Status Manifes</option>
                                    @foreach ($data_status_manifes as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="pesanan_men_cargo_id"><strong>Data STT Pesanan <button class="btn btn-primary"
                                            type="button" disabled>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </button>
                                    </strong><span class="text-danger">*</span>
                                </label>
                                <select name="pesanan_mbs_cargo_id" id="pesanan_mbs_cargo_id"
                                    class="form-control js-example-basic-single">
                                    <option value="">Pilih STT Pesanan</option>
                                    @foreach ($data_pesanan_mbs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="vendor_id"><strong>Vendor</strong><span class="text-danger">*</span>
                                </label>
                                <select name="vendor_id" id="vendor_id"
                                    class="form-control js-example-basic-single">
                                    <option value="">Pilih Vendor</option>
                                    @foreach ($data_pesanan_mbs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                    <a href="/dataMTC" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                </div>

                <div class="form-group mt-3">
                    <button class="form-control btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
