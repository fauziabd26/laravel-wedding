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
            @if (Auth::user()->is_admin == 'true')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Wedding</h5>
                    <div class="table-responsive">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama User</th>
                                    <th class="text-center">Nama Wedding</th>
                                    <th class="text-center">Link Wedding</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wedding as $key => $data)
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td class="text-center">{{ $data->user->fullname }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('homeIndex', $data->name) }}" target="_blank">
                                            {{ route('homeIndex', $data->name) }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $data->id }}"> <i class="bx bx-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else

            @endif
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
                @elseif (Auth::user()->is_admin == 0)
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