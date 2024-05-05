@extends('admin.layouts.index')

@section('title','Gallery')

@section('content')

<div class="pagetitle">
    <h1>Gallery</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Gallery</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gallery Wedding</h5>

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
                    @foreach ($gallery as $item)
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery1 }}" target="_blank">
                                <img src="{{ url('/storage/') }}/{{ $item->gallery1 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 1</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery2 }}" target="_blank">
                                <img src="{{ url('/storage/') }}/{{ $item->gallery2 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 2</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery3 }}" target="_blank">
                                <img src="{{ url('/storage/') }}/{{ $item->gallery3 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 3</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery4 }}" target="_blank">
                                <img src="{{ url('/storage/') }}/{{ $item->gallery4 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 4</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery5 }}" target="_blank">
                                <img src="{{ url('/storage/') }}/{{ $item->gallery5 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 5</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                        <div class="col-lg-2" style="text-align-last: center;">
                            <a class="lightbox" href="{{ url('/storage/') }}/{{ $item->gallery6 }}" target="_blank">
                                <img src="{{ url('/storage/') }}/{{ $item->gallery6 }}" height="100px" width="auto">
                            </a><br />
                            <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 6</label><br />
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                    @foreach ($gallery as $item)
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-2" style="text-align-last: center;">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $item->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 3</label><br />
                                <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}"> <i class="bx bx-pencil"></i> Edit Video</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div><!-- End Pills Tabs -->

        </div>
    </div>
</section>


<!-- start modal edit -->
@foreach ($gallery as $data)
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