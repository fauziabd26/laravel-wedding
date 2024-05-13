@extends('admin.layouts.index')

@section('title','User')

@section('content')

<div class="pagetitle">
    <h1>User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User</h5>
                    <div class="card-title" style="text-align: end; margin-right: 10px;">
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus"></i> Tambah User</button>
                    </div>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Fullname</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Facebook</th>
                                <th class="text-center">Instagram</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $key => $data)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td class="text-center">{{ $data->fullname }}</td>
                                <td class="text-center">{{ $data->email }}</td>
                                <td class="text-center">{{ $data->country }}</td>
                                <td class="text-center">{{ $data->phone }}</td>
                                <td class="text-center">{{ $data->facebook_link }}</td>
                                <td class="text-center">{{ $data->instagram_link }}</td>
                                <td class="text-center"> <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : asset('assets/ui/img/profile-img.jpg') }}" height="100px" /></td>
                                <td class="text-center">
                                    @if ($data->is_admin == 1)
                                    <span class="badge bg-primary">Admin</span>
                                    @else
                                    <span class="badge bg-secondary">User</span>
                                    @endif
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Fullname</label>
                                <input name="fullname" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('fullname') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="formrow-firstname-input" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Password Confirmation</label>
                                <input name="password_confirmation" type="password" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Country</label>
                                <input name="country" type="text" class="form-control" id="formrow-firstname-input" value="{{ old('country') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Phone</label>
                                <input name="phone" type="number" class="form-control" id="formrow-firstname-input" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link Twitter</label>
                                <input name="twitter_link" type="text" class="form-control" id="formrow-firstname-input" value="https://twitter.com/#">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link Facebook</label>
                                <input name="facebook_link" type="text" class="form-control" id="formrow-firstname-input" value="https://facebook.com/#">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link Instagram</label>
                                <input name="instagram_link" type="text" class="form-control" id="formrow-firstname-input" value="https://instagram.com/#">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link LinkedIn</label>
                                <input name="linkedin_link" type="text" class="form-control" id="formrow-firstname-input" value="https://linkedin.com/#">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Role User</label>
                                <select name="is_admin" class="form-control" id="formrow-firstname-input">
                                    <option disabled selected>---Pilih Role User ---</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
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
@foreach ($user as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Name</label>
                                <input name="name" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Fullname</label>
                                <input name="fullname" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->fullname }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="formrow-firstname-input" value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Country</label>
                                <input name="country" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->country }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Phone</label>
                                <input name="phone" type="number" class="form-control" id="formrow-firstname-input" value="{{ $data->phone }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link Twitter</label>
                                <input name="twitter_link" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->twitter_link }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link Facebook</label>
                                <input name="facebook_link" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->facebook_link }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link Instagram</label>
                                <input name="instagram_link" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->instagram_link }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Link LinkedIn</label>
                                <input name="linkedin_link" type="text" class="form-control" id="formrow-firstname-input" value="{{ $data->instagram_link }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Role User</label>
                                <select name="is_admin" class="form-control" id="formrow-firstname-input">
                                    <option disabled selected>---Pilih Role User ---</option>
                                    <option value="1" {{ "1" == $data->is_admin ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ "0" == $data->is_admin ? 'selected' : '' }}>User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="formrow-firstname-input" class="form-label">Photo Sebelumnya</label>
                            <div>
                                <img src="{{ isset(Auth::user()->photo) ? asset(Auth::user()->photo) : asset('assets/ui/img/profile-img.jpg') }}" height="100px" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="formrow-firstname-input" class="form-label">Ganti Photo</label>
                            <input name="photo" type="file" class="form-control">

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
@foreach ($user as $data)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mb-3">
                        <p> Apakah Sdr. {{ auth()->user()->name }} ingin menghapus data <b class="text-uppercase">{{ $data->name }}</b>? </p>
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