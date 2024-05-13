@extends('admin.layouts.index')

@section('title','Invitations')

@section('content')

<div class="pagetitle">
    <h1>Invitations</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Invitations</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    @if (Auth::user()->is_admin == 0)
    @if ($redaksi === null)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Redaksi kata</h5>
                        </div>
                    </div>
                    <div class="mb-3">
                        <form action="{{ route('redaksi.store') }}" method="POST">
                            @csrf
                            <label for="formrow-firstname-input" class="form-label">Redaksi Kata</label>
                            <div class="mt-3">
                                <textarea name="kata" type="text" class="form-control" id="formrow-firstname-input" rows="5" cols="5"></textarea>
                                <button type="button" class="btn btn-info text-italic waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-Redaksi" data-placement="top" title="Klik Untuk Lihat Contoh Redaksi"> <i class="bi bi-info-circle"></i> Klik Untuk Lihat Contoh Redaksi</button>
                            </div>
                            <div class="col mt-2" style="text-align-last: right;">
                                <button type="submit" class="btn btn-success waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-addThank"> <i class="bi bi-check-circle"></i> Save Form</button>
                            </div>
                        </form>
                        <div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-Redaksi">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Contoh Redaksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            السلا م عليكم ورحمة الله وبر كا ته
                                            <br /><br />
                                            Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bpk/Ibu/Sdr/i *[ Lamjaya ]* untuk menghadiri Tasyakuran Pernikahan putra-putri kami. <br /><br />

                                            https://kufita-fauzi.fauziaaf.cloud?to=Lamjaya <br /><br />

                                            🗓 Hari, Tanggal : Sabtu, 10 Februari 2024 <br /><br />
                                            🕛 Jam : 10.00 WIB - 17.00 <br /><br />
                                            📍Alamat : Taman Komplek Baitul Karim, Jl. Bonjol Buntu Rt/Rw : 007/003, Kel. Jakasetia, Kec. Bekasi Selatan, Kota Bekasi
                                            https://maps.app.goo.gl/gaLV4SHLNSFGUPtp7

                                            Merupakan suatu kebahagiaan bagi kami apabila Bpk/Ibu/Sdr/i berkenan untuk hadir dan memberikan doa restu.
                                            Mohon maaf perihal undangan hanya di bagikan melalui pesan ini, <br /><br />

                                            Atas perhatiannya kami ucapkan Terimakasih. <br /><br />

                                            والسلام عليكم ورحمة الله وبركا ته
                                            <br /><br />
                                            Hormat Kami,<br /><br />
                                            *Bapak H. Sukardi & Ibu Hj. Karsini*
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Form Redaksi Kata</h5>
                        </div>
                        <div class="col mt-2" style="text-align-last: right;">
                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm m-2" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $redaksi->id }}"> <i class="bx bx-pencil"></i> Edit Form</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Redaksi Kata</label>
                        <textarea disabled name="kata" type="text" class="form-control" id="formrow-firstname-input">{{ $redaksi->kata }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Orang Yang Diundang</h5>
                    @if (Auth::user()->is_admin == 0)
                    <div class="col mt-2" style="text-align-last: right;">
                        @if ($redaksi != null)
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus-circle"></i> Tambah Data</button>
                        @else
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Silahkan isi redaksi terlebih dahulu"><i class="bx bx-plus-circle"></i>
                            Tambah Data
                        </button>
                        @endif
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th>Kata</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invitations as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td> <a href="{{ $data->link }}" target="_blank"> {{ $data->link }} </a> </td>
                                    <td>{{ $data->Redaksi->kata }}</td>
                                    <td>
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


@if (Auth::user()->is_admin == 0)
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Tambah Invitations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invitations.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Nama</label>
                        <input name="name" class="form-control" id="formrow-firstname-input" type="text">
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
@if ($redaksi != null)
<!-- start modal edit -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $redaksi->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Wishes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('redaksi.update', $redaksi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Redaksi Kata</label>
                        <textarea rows="4" cols="4" name="kata" class="form-control" id="formrow-firstname-input">{{ $redaksi->kata }}</textarea>
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
@foreach ($invitations as $data)
<!-- start modal edit -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-edit-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Form Edit Undangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invitations.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Invite</label>
                        <input type="text" name="name" class="form-control" id="formrow-firstname-input" value="{{ $data->name }}">
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

<!-- start modal Delete -->
<div class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" id="modal-delete-{{ $data->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invitations.destroy', $data->id) }}" method="POST" enctype="multipart/form-data">
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
<!-- End modal Delete -->

@endforeach

@endif


@endsection