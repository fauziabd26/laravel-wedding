@extends('admin.layouts.index')

@section('title','Galeri')

@section('css')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('content')

<div class="pagetitle">
    <h1>Galeri</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

@if (Auth::user()->is_admin == 1)
<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Gallery Wedding</h5>
            @foreach ($attachments as $data)
            <h4 style="text-align: center;" class="text-uppercase"> {{ $data->wedding->name }} </h4>
            <div class="row mt-5 mb-5">
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery1 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery1 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 1</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-gallery1-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery2 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery2 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 2</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-gallery2-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery3 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery3 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 3</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-gallery3-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery4 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery4 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 4</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-gallery4-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery5 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery5 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 5</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-gallery5-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
                </div>
                <div class="col-lg-2" style="text-align-last: center;">
                    <a class="lightbox" href="{{ Storage::url('gallery') }}/{{ $data->gallery6 }}" target="_blank">
                        <img src="{{ Storage::url('gallery') }}/{{ $data->gallery6 }}" height="100px" width="auto">
                    </a><br />
                    <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Photo 6</label><br />
                    <button type="button" class="btn btn-warning waves-effect waves-light btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#modal-edit-gallery6-{{ $data->id }}"> <i class="bx bx-pencil"></i> Edit Photo</button>
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
            <h5 class="card-title">Gallery Wedding</h5><!-- End Pills Tabs -->
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
                    <div class="card-title" style="text-align: end; margin-right: 10px;">
                        @if ($attachments->count() >= 6)
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" disabled> <i class="bx bx-plus"></i> Tambah Photo</button>
                        @else
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus"></i> Tambah Photo</button>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center"> No</th>
                                    <th class="text-center"> Gambar</th>
                                    <th class="text-center"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attachments as $key => $data)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('gallery') }}/{{ $data->file }}" style="height:120px; width:120px" />
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mt-5 mb-5">
                        <div class="col-lg-2" style="text-align-last: center;">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <label for="formrow-firstname-input" class="form-label ml-12 mt-4">Video</label><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Pills Tabs -->
    </div>
</section>
@endif

@if ($attachments != null && Auth::user()->is_admin == 0)
@foreach ($attachments as $data)

<!-- start modal edit -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('attachment.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Ganti Foto</label>
                        <input name="file" type="file" class="form-control" id="formrow-firstname-input">
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
<!-- start modal edit -->

<!-- start modal Delete -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('attachment.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="mb-3">
                        <p> Apakah Sdr. {{ auth()->user()->name }} ingin menghapus Foto ini</b>? </p>
                        <div style="text-align: center;">
                            <img src="{{ Storage::url('gallery') }}/{{ $data->file }}" style="height:120px; width:120px" />
                        </div>
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
<!-- End modal Delete -->
@endforeach
@endif

<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-add" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Tambah Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Sorry !</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('attachment.store',) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="mb-3">

                        <table id="dynamicTable">

                            <tr>
                                <th><label for="formrow-firstname-input" class="form-label">Photo </label></th>
                                <th class="text-end">Action</th>
                            </tr>

                            <tr>
                                <td><input type="file" name="filename[0]" class="form-control" /></td>
                                <td class="text-end"><button type="button" name="add" id="add" class="btn btn-success"><i class="bi bi-plus-circle"></i></button></td>
                            </tr>

                        </table>
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

@section('script')
<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        if (i <= 5) {
            $("#dynamicTable").append('<tr><td><input type="file" name="filename[' + i + ']" class="form-control" /></td><td class="text-end"><button type="button" class="btn btn-danger remove-tr"><i class="bi bi-trash-fill"></i></button></td></tr>');
        }
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection