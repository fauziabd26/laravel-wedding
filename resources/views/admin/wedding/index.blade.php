@extends('admin.layouts.index')

@section('title','Wedding')

@section('content')

<div class="pagetitle">
    <h1>Wedding</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Wedding</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">
                @if ($wedding === null)
                <div class="card-body">
                    <h5 class="card-title">Form Create Wedding</h5>

                    <form method="POST" action="{{ route('wedding.store') }}" autocomplete="false">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea rows="7" cols="7" class="form-control" name="note"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
                @else
                <div class="card-body">
                    <h5 class="card-title">Form Wedding</h5>

                    <form method="POST" action="{{ route('wedding.update',$wedding->id) }}" autocomplete="false">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $wedding->name }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                                <textarea rows="7" cols="7" class="form-control">{{ $wedding->note }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
                @endif
            </div>

        </div>
    </div>
</section>

@endsection