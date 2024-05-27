@extends('admin.layouts.index')

@section('title','Music')

@section('content')

<div class="pagetitle">
    <h1>Music</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Music</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Music</h5>

                    @if (Auth::user()->is_admin == 1)
                    <div class="table-responsive">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5px;">No</th>
                                    <th class="text-center" style="width: 10px;">Nama Wedding</th>
                                    <th class="text-center" style="width: 10px;">Nama Music</th>
                                    <th class="text-center" style="width: 10px;">File Music</th>
                                    <th class="text-center" style="width: 40px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($music as $key => $data)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">{{ $data->wedding->name }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ $data->file }}</td>
                                    <td class="text-center" style="width: 50px;">
                                        <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $data->id }}"> <i class="bx bx-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    @else
                    @if ($music === null)
                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data" autocomplete="false" class="needs-validation" novalidate>
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Music</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" required name="file" accept="audio/*">
                                <div class="invalid-feedback">
                                    File Music Tidak Boleh Kosong
                                </div>
                                @if (count($errors) > 0)
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->
                    @else
                    <!-- General Form Elements -->
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Play Music</label>
                        <div class="col-sm-10">
                            <audio controls autoplay>
                                <source src="{{ Storage::url('music/') }}{{ $music->file }}" type="audio/mpeg">
                                Browsermu tidak mendukung tag audio, upgrade donk!
                            </audio>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('music.update', $music->id) }}" enctype="multipart/form-data" autocomplete="false">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Ganti Music</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger mt-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Form</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->
                    @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

@endsection