@extends('admin.layouts.index')

@section('title','Gallery')

@section('content')

<div class="pagetitle">
    <h1>Gallery</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if (Auth::user()->is_admin == 1)
<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gallery Wedding</h5>
            @foreach ($gallery as $data)
            <h4 style="text-align: center;" class="text-uppercase"> {{ $data->wedding->name }} </h4>
            <div class="row mt-5 mb-5">
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery1 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery1 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 1</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery2 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery2 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 2</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery3 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery3 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 3</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery4 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery4 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 4</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery5 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery5 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 5</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery6 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery6 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 6</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@if (Auth::user()->is_admin == 0)
<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gallery Wedding</h5>
            @if ($gallery === null )
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-2" style="text-align-last: center;">
                            <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus-circle"></i> Tambah Photo</button>
                        </div>
                    </div>
                </div>
            </div><!-- End Pills Tabs -->
            @elseif ($gallery != null)
            <!-- Pills Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Photo</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Video</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $gallery->gallery1 }}" target="_blank">
                                <img src="{{ Storage::url('gallery') }}/{{ $gallery->gallery1 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 1</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $gallery->gallery2 }}" target="_blank">
                                <img src="{{ Storage::url('gallery') }}/{{ $gallery->gallery2 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 2</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $gallery->gallery3 }}" target="_blank">
                                <img src="{{ Storage::url('gallery') }}/{{ $gallery->gallery3 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 3</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $gallery->gallery4 }}" target="_blank">
                                <img src="{{ Storage::url('gallery') }}/{{ $gallery->gallery4 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 4</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $gallery->gallery5 }}" target="_blank">
                                <img src="{{ Storage::url('gallery') }}/{{ $gallery->gallery5 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 5</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $gallery->gallery6 }}" target="_blank">
                                <img src="{{ Storage::url('gallery') }}/{{ $gallery->gallery6 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 6</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-2" style="text-align-last: center;">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $gallery->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 3</label><br />
                                <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $gallery->id }}"> <i class="bx bx-pencil"></i> Edit Video</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Pills Tabs -->
            @endif
        </div>
    </div>
</section>
@endif

@if ($gallery != null && Auth::user()->is_admin == 0)
<!-- start modal edit -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $gallery->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Ganti Foto</label>
                        <input name="gallery" type="file" class="form-control" id="formrow-firstname-input">
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
<!-- End modal edit -->
@endif

<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Tambah Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gallery.store',) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Photo 1</label>
                        <input type="file" name="gallery1" class="form-control" id="formrow-firstname-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-child-input" class="form-label">Photo 2</label>
                        <input type="file" name="gallery2" class="form-control" id="formrow-child-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo 3</label>
                        <input type="file" name="gallery3" class="form-control" id="formrow-child-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo 4</label>
                        <input type="file" name="gallery4" class="form-control" id="formrow-password-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo 5</label>
                        <input type="file" name="gallery5" class="form-control" id="formrow-password-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Photo 6</label>
                        <input type="file" name="gallery6" class="form-control" id="formrow-password-input">
                    </div>
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Video</label>
                        <input type="text" name="video" class="form-control" id="formrow-password-input">
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

@endsection