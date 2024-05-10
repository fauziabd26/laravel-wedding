@extends('admin.layouts.index')

@section('title','Pengantin')

@section('content')

<div class="pagetitle">
    <h1>Pengantin</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item">Pengantin</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Pengantin Perempuan</h5>
                        </div>
                    </div>
                    <form action="{{ route('bride.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Nama Pengantin Perempuan</label>
                            <input name="name" type="text" class="form-control" id="formrow-firstname-input" placeholder="Mba Fulanah">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-child-input" class="form-label">Anak dari</label>
                            <input name="child" type="text" class="form-control" id="formrow-child-input" placeholder="Putri Pertama Dari Bapak ...">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Bapak</label>
                            <input name="name_father" type="text" class="form-control" id="formrow-password-input" placeholder="Bapak Sambo">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Ibu</label>
                            <input name="name_mother" type="text" class="form-control" id="formrow-password-input" placeholder="Ibu Putri">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">link Instagram</label>
                            <input name="instagram" type="text" class="form-control" id="formrow-password-input" placeholder="https://www.instagram.com/ferdi.samboo/">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-role-input" class="form-label">Bank</label>
                            <select name="bank_id" class="form-control select2" id=formrow-role-input>
                                <option selected disabled>--Pilih Bank--</option>
                                @foreach ($bank as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Akun Rekening</label>
                            <input name="acc_name" type="text" class="form-control" id="formrow-password-input" placeholder="Mba Fulanah">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nomor Rekening</label>
                            <input name="acc_number" type="text" class="form-control" id="formrow-password-input" placeholder="1234567890">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Photo</label>
                            <input name="photo" type="file" class="form-control" id="formrow-password-input">
                        </div>
                        <input type="hidden" name="gender" value="Female">
                        <div class="col mt-2" style="text-align-last: right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm m-2">Save Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Groom</h5>
                        </div>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="formrow-firstname-input">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-child-input" class="form-label">Child</label>
                            <input name="child" type="text" class="form-control" id="formrow-child-input">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Bapak</label>
                            <input name="name_father" type="text" class="form-control" id="formrow-password-input">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Ibu</label>
                            <input name="name_mother" type="text" class="form-control" id="formrow-password-input">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">link Instagram</label>
                            <input name="instagram" type="text" class="form-control" id="formrow-password-input">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="formrow-role-input">Bank</label>
                            <input name="acc_name" type="text" class="form-control" id="formrow-password-input">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Akun Rekening</label>
                            <input name="acc_name" type="text" class="form-control" id="formrow-password-input">
                        </div>
                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nomor Rekening</label>
                            <input name="acc_number" type="text" class="form-control" id="formrow-password-input">
                        </div>
                        <div class="col mt-2" style="text-align-last: right;">
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm m-2"> <i class="bx bx-pencil"></i> Edit Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection