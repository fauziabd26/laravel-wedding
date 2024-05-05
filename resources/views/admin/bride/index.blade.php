@extends('admin.layouts.index')

@section('title','Bride')

@section('content')

<div class="pagetitle">
    <h1>Bride</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Bride</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        @foreach ($bride as $data)
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if ($data->gender == 'Female')
                            <h5 class="card-title">Form Bride</h5>
                            @else
                            <h5 class="card-title">Form Groom</h5>
                            @endif
                        </div>
                        <div class="col mt-2" style="text-align-last: right;">
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Form</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Name</label>
                        <input disabled name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="formrow-child-input" class="form-label">Child</label>
                        <input disabled name="child" type="text" class="form-control" id="formrow-child-input" value="{{ $data->child }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama Bapak</label>
                        <input disabled name="name_father" type="text" class="form-control" id="formrow-password-input" value="{{ $data->name_father }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama Ibu</label>
                        <input disabled name="name_mother" type="text" class="form-control" id="formrow-password-input" value="{{ $data->name_mother }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">link Instagram</label>
                        <input disabled name="instagram" type="text" class="form-control" id="formrow-password-input" value="{{ $data->instagram }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-role-input">Bank</label>
                        <input disabled name="acc_name" type="text" class="form-control" id="formrow-password-input" value="{{ $data->bank->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama Akun Rekening</label>
                        <input disabled name="acc_name" type="text" class="form-control" id="formrow-password-input" value="{{ $data->acc_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nomor Rekening</label>
                        <input disabled name="acc_number" type="text" class="form-control" id="formrow-password-input" value="{{ $data->acc_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo</label><br />
                        <a href="{{ url('/storage/') }}/{{ $data->photo }}" target="_blank">
                            <img src="{{ url('/storage/') }}/{{ $data->photo }}" style="height:100px; widht:auto;">
                        </a>
                    </div>


                </div>
            </div>

        </div>
        @endforeach
    </div>
</section>


<!-- start modal edit -->
@foreach ($bride as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Bride</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bride.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="formrow-child-input" class="form-label">Child</label>
                        <input name="child" type="text" class="form-control" id="formrow-child-input" value="{{ $data->child }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama Bapak</label>
                        <input name="name_father" type="text" class="form-control" id="formrow-password-input" value="{{ $data->name_father }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama Ibu</label>
                        <input name="name_mother" type="text" class="form-control" id="formrow-password-input" value="{{ $data->name_mother }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">link Instagram</label>
                        <input name="instagram" type="text" class="form-control" id="formrow-password-input" value="{{ $data->instagram }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formrow-role-input">Pilih Bank</label>
                        <select name="bank_id" class="form-control select2" id=formrow-role-input>
                            <option disabled>--Pilih Bank--</option>
                            @foreach ($bank as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $data->bank_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama Akun Rekening</label>
                        <input name="acc_name" type="text" class="form-control" id="formrow-password-input" value="{{ $data->acc_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nomor Rekening</label>
                        <input name="acc_number" type="text" class="form-control" id="formrow-password-input" value="{{ $data->acc_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo</label>
                        <input name="photo" type="file" class="form-control" id="formrow-password-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo Sebelumnya</label>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modal-photo-{{ $data->id }}">
                            <img src="{{ url('/storage/') }}/{{ $data->photo }}" style="height:100px; widht:auto;">
                        </a>
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


<!-- start modal photo -->
@foreach ($bride as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-photo-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Photo Bride</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ url('/storage/') }}/{{ $data->photo }}" style="height:500px; widht:auto;">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect btn-sm m-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-left-arrow-circle"></i> Back To Form</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endforeach
<!-- End modal photo -->


@endsection