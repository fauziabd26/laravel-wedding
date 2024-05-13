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

                    @if (Auth::user()->is_admin == 1)
                    <div class="table-responsive">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5px;">No</th>
                                    <th class="text-center" style="width: 10px;">Nama Wedding</th>
                                    <th class="text-center" style="width: 10px;">Nama</th>
                                    <th class="text-center" style="width: 30px;">Alamat</th>
                                    <th class="text-center" style="width: 20px;">Maps</th>
                                    <th class="text-center" style="width: 40px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gift as $key => $data)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">{{ $data->wedding->name }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ $data->address }}</td>
                                    <td class="text-center">{{ $data->maps }}</td>
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
                    @if ($gift === null)
                    <!-- General Form Elements -->
                    <form method="POST" action="{{ route('gift.store') }}" autocomplete="false" class="needs-validation" novalidate>
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="name" autofocus>
                                <div class="invalid-feedback">
                                    Nama Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea rows="7" cols="7" name="address" class="form-control" required></textarea>
                                <div class="invalid-feedback">
                                    Alamat Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Maps</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="maps" value="">
                                <div class="invalid-feedback">
                                    Maps Tidak Boleh Kosong
                                </div>
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
                    <form method="POST" action="{{ route('gift.update', $gift->id) }}" autocomplete="false">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $gift->name }}" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">address</label>
                            <div class="col-sm-10">
                                <textarea rows="7" cols="7" name="address" class="form-control">{{ $gift->address }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Maps</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="maps" value="{{ $gift->maps }}">
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