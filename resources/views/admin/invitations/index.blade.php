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

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Orang Yang Diundang</h5>
                    @if (Auth::user()->is_admin == 0)
                    <div class="col mt-2" style="text-align-last: right;">
                        <button type="button" class="btn btn-primary waves-effect waves-light btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#modal-add"> <i class="bx bx-plus-circle"></i> Tambah Data</button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th>Copy</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invitations as $key => $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td> <a href="{{ $data->link }}" target="_blank"> {{ $data->link }} </a> </td>
                                    <td>
                                        <button class="btn btn-success waves-light btn-sm mb-2 rounded-3" data-nomer="{{ $data->kata }}" onclick="util.salin(this)"> <i class="bx bx-copy"></i> Salin Link</button>
                                    </td>
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

@section('script')
<script type="text/javascript">
    const util = (() => {

        const opacity = (nama) => {
            let nm = document.getElementById(nama);
            let op = parseInt(nm.style.opacity);
            let clear = null;

            clear = setInterval(() => {
                if (op >= 0) {
                    nm.style.opacity = op.toString();
                    op -= 0.025;
                } else {
                    clearInterval(clear);
                    clear = null;
                    nm.remove();
                    return;
                }
            }, 10);
        };

        const escapeHtml = (unsafe) => {
            return unsafe
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        };

        const salin = (btn, msg = 'Tersalin', timeout = 1500) => {
            navigator.clipboard.writeText(btn.getAttribute('data-nomer'));

            let tmp = btn.innerHTML;
            btn.innerHTML = msg;
            btn.disabled = true;

            let clear = null;
            clear = setTimeout(() => {
                btn.innerHTML = tmp;
                btn.disabled = false;
                btn.focus();

                clearTimeout(clear);
                clear = null;
                return;
            }, timeout);
        };

        const timer = () => {
            let countDownDate = (new Date(document.getElementById('tampilan-waktu').getAttribute('data-waktu').replace(' ', 'T'))).getTime();

            setInterval(() => {
                let distance = Math.abs(countDownDate - (new Date()).getTime());

                document.getElementById('hari').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                document.getElementById('jam').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                document.getElementById('menit').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                document.getElementById('detik').innerText = Math.floor((distance % (1000 * 60)) / 1000);
            }, 1000);
        };

        const play = (btn) => {
            if (btn.getAttribute('data-status') !== 'true') {
                btn.setAttribute('data-status', 'true');
                audio.play();
                btn.innerHTML = '<i class="fa-solid fa-circle-pause"></i>';
            } else {
                btn.setAttribute('data-status', 'false');
                audio.pause();
                btn.innerHTML = '<i class="fa-solid fa-circle-play"></i>';
            }
        };

        const modal = (img) => {
            document.getElementById('show-modal-image').src = img.src;
            (new bootstrap.Modal('#modal-image')).show();
        };

        const tamu = () => {
            let name = (new URLSearchParams(window.location.search)).get('to');

            if (!name) {
                document.getElementById('nama-tamu').remove();
                return;
            }

            let div = document.createElement('div');
            div.classList.add('m-2');
            div.innerHTML = `<p class="mt-0 mb-1 mx-0 p-0 text-light">Kepada Yth Bapak/Ibu/Saudara/i</p><h2 class="text-light">${escapeHtml(name)}</h2>`;

            document.getElementById('form-nama').value = name;
            document.getElementById('nama-tamu').appendChild(div);
        };

        const animation = async () => {
            const duration = 10 * 1000;
            const animationEnd = Date.now() + duration;
            let skew = 1;

            let randomInRange = (min, max) => {
                return Math.random() * (max - min) + min;
            };

            (async function frame() {
                const timeLeft = animationEnd - Date.now();
                const ticks = Math.max(200, 500 * (timeLeft / duration));

                skew = Math.max(0.8, skew - 0.001);

                await confetti({
                    particleCount: 1,
                    startVelocity: 0,
                    ticks: ticks,
                    origin: {
                        x: Math.random(),
                        y: Math.random() * skew - 0.2,
                    },
                    colors: ["FFC0CB", "FF69B4", "FF1493", "C71585"],
                    shapes: ["heart"],
                    gravity: randomInRange(0.5, 1),
                    scalar: randomInRange(1, 2),
                    drift: randomInRange(-0.5, 0.5),
                });

                if (timeLeft > 0) {
                    requestAnimationFrame(frame);
                }
            })();
        };

        const buka = async () => {
            document.querySelector('body').style.overflowY = 'scroll';
            AOS.init();
            audio.play();

            opacity('welcome');
            document.getElementById('tombol-musik').style.display = 'block';
            timer();

            await confetti({
                origin: {
                    y: 0.8
                },
                zIndex: 1057
            });
            await session.check();
            await animation();
        };

        return {
            buka: buka,
            tamu: tamu,
            modal: modal,
            play: play,
            salin: salin,
            escapeHtml: escapeHtml,
            opacity: opacity
        };
    })();
</script>
@endsection