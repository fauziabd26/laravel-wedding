@extends('admin.layouts.index')

@section('title','Events')

@section('content')

<div class="pagetitle">
    <h1>Events</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Events</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        @foreach ($events as $data)
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Events</h5>
                        </div>
                        <div class="col mt-2" style="text-align-last: right;">
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Form</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Tipe Acara</label>
                        <input disabled name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->type }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-child-input" class="form-label">Tanggal</label>
                        <input disabled name="child" type="text" class="form-control" id="formrow-child-input" value="{{ date('l, d F Y', strtotime($data->date)) }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-child-input" class="form-label">Pukul</label>
                        <input disabled name="child" type="text" class="form-control" id="formrow-child-input" value="{{ date('H:i:s', strtotime($data->date)) }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Alamat</label>
                        <input disabled name="name_father" type="text" class="form-control" id="formrow-password-input" value="{{ $data->address }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Maps</label>
                        <input disabled name="name_mother" type="text" class="form-control" id="formrow-password-input" value="{{ $data->maps }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Kalender</label>
                        <textarea disabled rows="5" cols="5" class="form-control" id="formrow-password-input"> {{ $data->calendar }} </textarea>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</section>


<!-- start modal edit -->
@foreach ($events as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Events</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('events.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Tipe Acara</label>
                        <input disabled name="type" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->type }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-child-input" class="form-label">Tanggal</label>
                        <input name="date" type="datetime-local" class="form-control" id="formrow-child-input" value="{{ \Carbon\Carbon::parse($data->date)->format('Y-m-d H:i') }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Alamat</label>
                        <textarea rows="3" cols="3" name="address" class="form-control" id="formrow-password-input">{{ $data->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Maps</label>
                        <input name="maps" type="text" class="form-control" id="formrow-password-input" value="{{ $data->maps }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Kalender</label>
                        <textarea rows="7" cols="7" name="calendar" class="form-control" id="formrow-password-input">{{ $data->calendar }}</textarea>
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
@endsection