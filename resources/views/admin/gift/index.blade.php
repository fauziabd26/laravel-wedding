@extends('admin.layouts.index')

@section('title','Gift')

@section('content')

<div class="pagetitle">
    <h1>Gift</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Gift</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Gift</h5>

                    <!-- General Form Elements -->
                    @foreach ($gift as $data)
                    <form method="POST" action="{{ route('gift.update',$data->id) }}" autocomplete="false">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">address</label>
                            <div class="col-sm-10">
                                <textarea rows="7" cols="7" name="address" class="form-control">{{ $data->address }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Maps</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="maps" value="{{ $data->maps }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>

@endsection