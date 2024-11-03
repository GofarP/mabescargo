@extends('master.masterdashboard')
@section('title', 'Tingkatan Wilayah Index')
@section('main-title')
    <h3>Tingkatan Wilayah</h3>
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible w-100" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-error alert-dismissible w-100" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @livewire('tingkatan-wilayah.tingkatan-wilayah-index')

@endsection
