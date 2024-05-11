@extends('admin.layouts.index')

@section('title','Story Wedding')

@section('content')

<div class="pagetitle">
    <h1>Story Wedding</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Story Wedding</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if (Auth::user()->is_admin == 0)

@if ($wedding === null)
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cerita Cinta</h5>
                    <p>Silahkan Mengisi Data Di Menu Wedding Terlebih Dahulu</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endif

@if (Auth::user()->is_admin == 0)
@if ($wedding != null)
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cerita Cinta</h5>
                    <div class="card-title" style="text-align: end; margin-right: 10px;">
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus"></i> Tambah Cerita</button>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Isi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $key => $data)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{ date('d-F-Y', strtotime($data->tanggal)) }}</td>
                                <td class="text-center">{{ $data->judul }}</td>
                                <td class="text-center">{{ $data->isi }}</td>
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
                <h5 class="modal-title" id="myModalLabel">Form Add Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('story.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="formrow-firstname-input" value="{{ old('tanggal') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Judul</label>
                        <input name="judul" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('judul') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">isi</label>
                        <textarea rows="4" cols="4" name="isi" class="form-control" id="formrow-firstname-input"></textarea>
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
@foreach ($stories as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Wishes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('story.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="formrow-firstname-input" value="{{ $data->tanggal }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Judul</label>
                        <input name="judul" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">isi</label>
                        <textarea rows="4" cols="4" name="isi" class="form-control" id="formrow-firstname-input">{{ $data->isi }}</textarea>
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
@foreach ($stories as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Delete Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('story.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mb-3">
                        <p> Apakah {{ auth()->user()->name }} ingin menghapus data <b class="text-uppercase">{{ $data->judul }}</b>? </p>
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
@endif
@endif

@if (Auth::user()->is_admin == 1)
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cerita Cinta</h5>
                    <div class="card-title" style="text-align: end; margin-right: 10px;">
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus"></i> Tambah Cerita</button>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Isi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $key => $data)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{ date('d-F-Y', strtotime($data->tanggal)) }}</td>
                                <td class="text-center">{{ $data->judul }}</td>
                                <td class="text-center">{{ $data->isi }}</td>
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
                <h5 class="modal-title" id="myModalLabel">Form Add Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('story.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="formrow-firstname-input" value="{{ old('tanggal') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Judul</label>
                        <input name="judul" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('judul') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">isi</label>
                        <textarea rows="4" cols="4" name="isi" class="form-control" id="formrow-firstname-input"></textarea>
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
@foreach ($stories as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Wishes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('story.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Tanggal</label>
                        <input name="tanggal" type="date" class="form-control" id="formrow-firstname-input" value="{{ $data->tanggal }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Judul</label>
                        <input name="judul" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->judul }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">isi</label>
                        <textarea rows="4" cols="4" name="isi" class="form-control" id="formrow-firstname-input">{{ $data->isi }}</textarea>
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
@foreach ($stories as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Delete Story</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('story.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mb-3">
                        <p> Apakah {{ auth()->user()->name }} ingin menghapus data <b class="text-uppercase">{{ $data->judul }}</b>? </p>
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
@endif


@endsection