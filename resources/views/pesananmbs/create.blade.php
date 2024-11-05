<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('master.masterdashboard')
@section('title', 'Pesanan Tambah')
@section('main-title')
    <h3>Tambah Pesanan</h3>
@endsection


@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

            </nav>

            <div class="container-fluid">



                <!-- Content Row -->
                <div class="row">
                    @if (session('flash'))
                        <div class="alert alert-success" role="alert">
                            {{ session('flash') }}
                        </div>
                    @elseif(session('error-flash'))
                        <div class="alert alert-error" role="alert">
                            {{ session('error-flash') }}
                        </div>
                    @endif

                    <div class="card w-100">
                        <div class="card-body">
                            <form action="{{ route('pesananmbs.store') }}" method="POST">
                                @csrf
                                <section class="section">
                                    <div class="row">

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="stt">STT</label>
                                                <input type="number" id="stt" name="stt" class="form-control"
                                                    value="{{ old('stt') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="resi">Resi</label>
                                                <input type="text" id="resi" name="resi" class="form-control"
                                                    value="{{ old('resi') }}" required autofocus>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="customer_id"> Customer</label>
                                                <div wire:ignore>
                                                    <select name="customer_id" class="form-control js-example-basic-single">
                                                        <option value="">Pilih Customer</option>
                                                        @foreach ($data_customer as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                                <div wire:ignore>
                                                    <select name="metode_pembayaran_id"
                                                        class="form-control js-example-basic-single">
                                                        <option value="">Pilih Metode Pembayaran</option>
                                                        @foreach ($data_metode_pembayaran as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="status_pembayaran_id">Status Pembayaran</label>
                                                <div wire:ignore>
                                                    <select name="status_pembayaran_id"
                                                        class="form-control js-example-basic-single">
                                                        <option value="">Pilih Status Pembayaran</option>
                                                        @foreach ($data_status_pembayaran as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="harga_kg_barang">Harga Barang</label>
                                                <input type="number" name="harga_kg_barang" id="harga_kg_barang"
                                                    value="{{ old('harga_kg_barang') }}" wire:model="harga_barang"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="harga_unit">Harga Unit</label>
                                                <input type="number" name="harga_unit" value="{{ old('harga_unit') }}"
                                                    id="harga_unit" wire:keyup='hitungTotal' wire:model="harga_unit"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="harga_diskon">Harga Diskon</label>
                                                <input type="number" name="harga_diskon" id="harga_diskon"
                                                    value="{{ old('harga_diskon') }}" wire:model="harga_diskon"
                                                    wire:keyup='hitungTotal' class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="biaya_tambahan">Biaya Tambahan</label>
                                                <input type="number" name="biaya_tambahan" id="biaya_tambahan"
                                                    value="{{ old('biaya_tambahan') }}" wire:keyup='hitungTotal'
                                                    wire:model="biaya_tambahan" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="total_biaya">Total Biaya</label>
                                                <input type="number" name="total_biaya" id="total_biaya"
                                                    value="{{ old('total_biaya') }}" wire:keyup='hitungTotal'
                                                    wire:model="total_biaya" class="form-control" required readonly>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="uang_muka">Uang Muka</label>
                                                <input type="number" name="uang_muka" id="uang_muka"
                                                    value="{{ old('uang_muka') }}" wire:keyup='hitungTotal'
                                                    wire:model="uang_muka" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="uang_sisa">Uang Sisa</label>
                                                <input type="number" name="uang_sisa" id="uang_sisa"
                                                    value="{{ old('uang_sisa') }}" class="form-control"
                                                    wire:model="uang_sisa" readonly>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="waktu_pesan">Waktu Pesan</label>
                                                <input type="date" name="waktu_pesan"
                                                    value="{{ old('waktu_pesan') }}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                                <input type="date" name="tanggal_masuk"
                                                    value="{{ old('tanggal_masuk') }}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="jumlah_koli_awal">Jumlah Koli Awal</label>
                                                <input type="number" value="{{ old('jumlah_koli_awal') }}"
                                                    name="jumlah_koli_awal" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="jumlah_koli_packing">Jumlah Koli Packing</label>
                                                <input type="number" value="{{ old('jumlah_koli_packing') }}"
                                                    name="jumlah_koli_packing" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="volume">Volume</label>
                                                <input type="text" value="{{ old('volume') }}" name="volume"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="berat">Berat (KG)</label>
                                                <input type="number" value="{{ old('berat') }}" name="berat"
                                                    id="berat" class="form-control" wire:model="berat" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="dimensi">Dimensi</label>
                                                <input type="number" value="{{ old('dimensi') }}" name="dimensi"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="unit">Unit</label>
                                                <input type="number" name="unit" id="unit" wire:model="unit"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="kubikasi">Kubikasi</label>
                                                <input type="number" name="kubikasi" value="0"
                                                    class="form-control" required>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="jalur">Jalur</label>
                                                <div wire:ignore>
                                                    <select name="jalur_id" class="form-control js-example-basic-single">
                                                        <option value="">Pilih Jalur Pengiriman</option>
                                                        @foreach ($data_jalur as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="wilayah_asal_id">Wilayah Asal</label>
                                                <div wire:ignore>
                                                    <select name="wilayah_asal_id"
                                                        class="form-control js-example-basic-single">
                                                        <option value="">Pilih Daerah Asal</option>
                                                        @foreach ($data_wilayah as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="wilayah_tujuan_id">Wilayah Tujuan</label>
                                                <div wire:ignore>
                                                    <select name="wilayah_tujuan_id"
                                                        class="form-control js-example-basic-single">
                                                        <option value="">Pilih Daerah Tujuan</option>
                                                        @foreach ($data_wilayah as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="cabang_id">Cabang</label>
                                                <div wire:ignore>
                                                    <select name="cabang_id" class="form-control js-example-basic-single">
                                                        <option value="">Pilih Cabang</option>
                                                        @foreach ($data_cabang as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="karyaywan_id">Karyawan</label>
                                                <div wire:ignore>
                                                    <select name="karyawan_id"
                                                        class="form-control js-example-basic-single">
                                                        <option value="">Pilih Karyawan</option>
                                                        @foreach ($data_karyawan as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="nama_penerima">Nama Penerima</label>
                                                <input type="text" value="{{ old('nama_penerima') }}"
                                                    class="form-control" name="nama_penerima" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="no_telp_penerima">No Telp Penerima</label>
                                                <input type="number" value="{{ old('no_telp_penerima') }}"
                                                    class="form-control" name="no_telp_penerima" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="diterima_oleh">Diterima Oleh</label>
                                                <input type="text" name="diterima_oleh"
                                                    value="{{ old('diterima_oleh') }}" class="form-control" required>
                                            </div>
                                        </div>



                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="catatan_barang">Catatan Barang</label>
                                                <textarea name="catatan_barang" id="catatan_barang" cols="30" rows="10" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="instruksi">Instruksi</label>
                                                <textarea name="instruksi" id="instruksi" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="alamat_detail_tujuan">Alamat Detail Tujuan</label>
                                                <textarea name="alamat_detail_tujuan" id="alamat_detail_tujuan" cols="30" rows="10" required></textarea>
                                            </div>
                                        </div>

                                </section>
                                <button class="form-control btn-success mt-3">Simpan</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <script>
            $(document).ready(function() {

                $('#harga_kg_barang, #harga_unit, #harga_diskon, #biaya_tambahan, #total_biaya, #uang_muka, #uang_sisa, #berat, #unit')
                    .on('keyup', function() {
                        var harga_barang = parseFloat($('#harga_kg_barang').val()) || 0;
                        var harga_unit = parseFloat($('#harga_unit').val()) || 0;
                        var harga_diskon = parseFloat($('#harga_diskon').val()) || 0;
                        var biaya_tambahan = parseFloat($('#biaya_tambahan').val()) || 0;
                        var total_biaya = parseFloat($('#total_biaya').val()) || 0;
                        var uang_muka = parseFloat($('#uang_muka').val()) || 0;
                        var uang_sisa = parseFloat($('#uang_sisa').val()) || 0;
                        var berat = parseFloat($('#berat').val()) || 0;
                        var unit = parseFloat($('#unit').val()) || 0;

                        var biaya_barang = 5000; // Set your biaya_barang value here
                        var biaya_unit = 100000; // Set your biaya_unit value here
                        var total_barang = berat * harga_barang;
                        var total_unit = unit * harga_unit;
                        var total_biaya = total_barang + total_unit + biaya_tambahan - harga_diskon;

                        var uang_sisa = uang_muka - total_biaya;

                        // Update total_biaya input field
                        $('#total_biaya').val(total_biaya);

                        $('#uang_sisa').val(uang_sisa);
                    });

            });
        </script>



    </div>
@endsection
