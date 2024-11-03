@extends('master.masterdashboard')
@section('title', 'Kontak Index')
@section('main-title')
    <h3>Kontak Index</h3>
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

    @livewire('kontak.kontak-index')

@endsection
