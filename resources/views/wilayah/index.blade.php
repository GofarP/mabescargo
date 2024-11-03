@extends('master.masterdashboard')
@section('title', 'Wilayah Index')
@section('main-title')
    <h3>Wilayah</h3>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @livewire('wilayah.wilayah-index')

@endsection
