@extends('admin.layouts.index')

@section('title','Bank')

@section('content')

<div class="pagetitle">
    <h1>Bank</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Bank</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bank</h5>
                    <div class="card-title" style="text-align: end; margin-right: 10px;">
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus"></i> Tambah Bank</button>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $key => $data)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{ $data->name }}</td>
                                <td class="text-center">
                                    <a href="{{ Storage::url('bank/') }}{{ $data->logo }}" target="_blank">
                                        <img height="50px" width="auto" src="{{ Storage::url('bank/') }}{{ $data->logo }}" />
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
    </div>
</section>

<!-- Start modal add -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Add Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Nama Bank</label>
                        <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Logo Bank</label>
                        <input name="logo" type="file" class="form-control" id="formrow-firstname-input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End modal add -->

<!-- start modal edit -->
@foreach ($bank as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bank.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Nama Bank</label>
                        <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Logo Bank</label>
                        <input name="logo" type="file" class="form-control" id="formrow-firstname-input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endforeach
<!-- End modal edit -->

<!-- start modal Delete -->
@foreach ($bank as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Delete Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bank.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mb-3">
                        <p> Apakah {{ auth()->user()->name }} ingin menghapus data <b class="text-uppercase">{{ $data->name }}</b>? </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endforeach
<!-- End modal Delete -->


@endsection