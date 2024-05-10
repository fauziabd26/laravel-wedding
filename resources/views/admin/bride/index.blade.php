@extends('admin.layouts.index')

@section('title','Pengantin')

@section('content')

<div class="pagetitle">
    <h1>Pengantin</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Pengantin</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengantin</h5>
                    <div class="card-title" style="text-align: end; margin-right: 10px;">
                        @if($bride->count() < 2) <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus"></i> Tambah Data</button>
                            @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Anak Dari</th>
                                    <th class="text-center">Nama Bapak</th>
                                    <th class="text-center">Nama Ibu</th>
                                    <th class="text-center">Link Instagram</th>
                                    <th class="text-center">Bank</th>
                                    <th class="text-center">Nama Rekening</th>
                                    <th class="text-center">No Rekening</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bride as $key => $data)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ $data->child }}</td>
                                    <td class="text-center">{{ $data->name_father }}</td>
                                    <td class="text-center">{{ $data->name_mother }}</td>
                                    <td class="text-center">{{ $data->instagram }}</td>
                                    <td class="text-center">{{ $data->bank->name }}</td>
                                    <td class="text-center">{{ $data->acc_name }}</td>
                                    <td class="text-center">{{ $data->acc_number }}</td>
                                    <td class="text-center">{{ $data->gender }}</td>
                                    <td class="text-center">
                                        <a href="{{ Storage::url('bride/') }}{{ $data->photo }}" target="_blank">
                                            <img src="{{ Storage::url('bride/') }}{{ $data->photo }}" height="50px" />
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
    </div>
</section>

<!-- Start modal add -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Add Pengantin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bride.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Pengantin</label>
                                <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('name') }}" placeholder="Mas Fulan">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Anak Dari</label>
                                <input name="child" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('child') }}" placeholder="Putra Pertama dari">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Bapak</label>
                                <input name="name_father" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('name_father') }}" placeholder="Bapak Sambo">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Ibu</label>
                                <input name="name_mother" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('name_mother') }}" placeholder="Ibu Megawati">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Instagram</label>
                                <input name="instagram" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('instagram') }}" placeholder="https://instagram.com/ferdi.samboo">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Bank</label>
                                <select name="bank_id" class="form-control" id="formrow-firstname-input">
                                    <option disabled selected> --- Pilih Bank ---</option>
                                    @foreach ($bank as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Rekening</label>
                                <input name="acc_name" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('acc_name') }}" placeholder="Fulan">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nomor Rekening</label>
                                <input name="acc_number" type="number" class="form-control" id="formrow-firstname-input" value="{{ old('acc_number') }}" placeholder="091234124">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Jenis Kelamin</label>
                                <select name="gender" class="form-control" id="formrow-firstname-input">
                                    <option disabled selected>---Pilih Jenis Kelamin ---</option>
                                    <option value="Male">Laki - Laki</option>
                                    <option value="Female">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Photo</label>
                                <input name="photo" type="file" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
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
@foreach ($bride as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Data Pengantin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bride.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Pengantin</label>
                                <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Anak Dari</label>
                                <input name="child" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->child }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Bapak</label>
                                <input name="name_father" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name_father }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Ibu</label>
                                <input name="name_mother" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name_mother }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Instagram</label>
                                <input name="instagram" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->instagram }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Bank</label>
                                <select name="bank_id" class="form-control" id="formrow-firstname-input">
                                    <option disabled selected> --- Pilih Bank ---</option>
                                    @foreach ($bank as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $data->bank_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nama Rekening</label>
                                <input name="acc_name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->acc_name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Nomor Rekening</label>
                                <input name="acc_number" type="number" class="form-control" id="formrow-firstname-input" value="{{ $data->acc_number }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Jenis Kelamin</label>
                                <select name="gender" class="form-control" id="formrow-firstname-input">
                                    <option disabled selected>---Pilih Jenis Kelamin ---</option>
                                    <option value="Male" {{ "Male" == $data->gender ? 'selected' : '' }}>Laki - Laki</option>
                                    <option value="Female" {{ "Female" == $data->gender ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Photo</label>
                                <input name="photo" type="file" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
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
@foreach ($bride as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Delete Data Pengantin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('bride.destroy', $data->id) }}" method="POST">
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