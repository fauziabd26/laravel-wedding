@extends('admin.layouts.index')

@section('title','Ucapan')

@section('content')

<div class="pagetitle">
    <h1>Ucapan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Ucapan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ucapan</h5>
                    <p>Silahkan Mengisi Data Di Menu Wedding Terlebih Dahulu</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection