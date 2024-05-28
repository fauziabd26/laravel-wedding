@extends('admin.layouts.index')

@section('title','Wishes')

@section('content')

<div class="pagetitle">
    <h1>Wishes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Wishes</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    @if (Auth::user()->is_admin == 0)
    @if ($thanksForm === null)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Wishes</h5>
                        </div>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('thankStore') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <label for="formrow-firstname-input" class="form-label">Notes</label>
                            <input name="note" type="text" class="form-control" id="formrow-firstname-input" required>
                            <div class="invalid-feedback">
                                Notes tidak boleh kosong!
                            </div>
                            <div>
                                <span class="text-italic"><i class="bi bi-info-circle"></i> "Contoh : Ungkapan terima kasih yang sangat tulus dari kami apabila Saudara/i berkenan hadir dan turut memberikan doa restu kepada kami."</span>
                            </div>
                            <div class="col mt-2" style="text-align-last: right;">
                                <button type="submit" class="btn btn-success waves-effect waves-light btn-sm m-2"> <i class="bi bi-check-circle"></i> Save Form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        @foreach ($thanks as $data)
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Wishes</h5>
                        </div>
                        <div class="col mt-2" style="text-align-last: right;">
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Form</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Notes</label>
                        <input disabled name="note" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->note }}">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    @endif

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Harapan Orang Undangan</h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Ucapan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishes as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->comment }}</td>
                                    <td>
                                        @if ($data->hadir == 'true')
                                        <span class="badge bg-success"><i class="bi bi-check-circle"></i> Hadir</span>
                                        @else
                                        <span class="badge bg-danger"><i class="bi bi-x-circle-fill"> </i> Berhalangan</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@if (Auth::user()->is_admin == 0)
<!-- start modal edit -->
@foreach ($thanks as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Wishes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('thank', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Note</label>
                        <textarea rows="4" cols="4" name="note" class="form-control" id="formrow-firstname-input">{{ $data->note }}</textarea>
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
@endif


@endsection