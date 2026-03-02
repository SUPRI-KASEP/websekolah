@extends('layouts.app')
@section('title','Struktur Organisasi')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Struktur Organisasi</div>

                <div class="card-body">
                    <img src="{{ asset('img/struktur.png') }}" alt="Struktur Organisasi" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection