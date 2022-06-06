@extends('layouts.app')
@section('css')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
    .utama {
        display: flex;
        margin-top: 5%;
        width: 1150px;
        height: 420px;
        border: 1px solid white;
        background-color: white;
    }

    .tools {
        width: 250px;
        height: 419px;
        border: 1px solid #E5E5E5;
        background-color: #E5E5E5;
    }

    .box {
        background-color: white;
    }

    .box hr {
        background-color: white;
    }

    .container-4 {
        overflow: hidden;
        width: 250px;
        vertical-align: middle;
        white-space: nowrap;
        background-color: #E5E5E5;
    }

    .container-4 input#search {
        width: 250px;
        height: 50px;
        background: #E5E5E5;
        border: none;
        font-size: 10pt;
        float: left;
        color: black;
        padding-left: 15px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .container-4 input#search::-webkit-input-placeholder {
        color: #65737e;
    }

    .container-4 input#search:-moz-placeholder {
        /* Firefox 18- */
        color: #65737e;
    }

    .container-4 input#search::-moz-placeholder {
        /* Firefox 19+ */
        color: #65737e;
    }

    .container-4 input#search:-ms-input-placeholder {
        color: #65737e;
    }

    .container-4 button.icon {
        -webkit-border-top-right-radius: 5px;
        -webkit-border-bottom-right-radius: 5px;
        -moz-border-radius-topright: 5px;
        -moz-border-radius-bottomright: 5px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;

        border: none;
        background: #452525;
        height: 50px;
        width: 50px;
        color: #4f5b66;
        opacity: 0;
        font-size: 10pt;

        -webkit-transition: all .55s ease;
        -moz-transition: all .55s ease;
        -ms-transition: all .55s ease;
        -o-transition: all .55s ease;
        transition: all .55s ease;
    }

    .container-4:hover button.icon,
    .container-4:active button.icon,
    .container-4:focus button.icon {
        outline: none;
        opacity: 1;
        margin-left: -50px;
    }

    .container-4:hover button.icon:hover {
        background: #452525;
    }

    .paraf {
        background-color: #E5E5E5;
        color: #452525;
        margin-left: 30px;
        margin-top: 50px;
    }

    .folder {
        background-color: #E5E5E5;
        display: inline-flex;
        margin-top: 20px;
        margin-left: 30px;
    }

    .folder img {
        background-color: #E5E5E5;
    }

    .folder button {
        background-color: #E5E5E5;
        margin-left: 50px;
        border: none;
    }

    .isi {
        margin-top: 3%;
        margin-left: 5%;
        width: 800px;
        height: 350px;
        border: 1px solid #E5E5E5;
        background-color: #E5E5E5;
    }

    .isi button {
        margin-left: 80%;
        margin-top: 20px;
        width: 60px;
        height: 30px;
        background: #C4C4C4;
        border-color: #C4C4C4;
    }

    .table {
        margin-top: 20px;
        border: none;
        background-color: #E5E5E5;
        padding: 5px 5px;
    }

    .table,
    th,
    td {
        padding: 10px 40px;
        text-align: center;
        background-color: #E5E5E5;
    }

    .table td img {
        background-color: #E5E5E5;
    }
</style>
@endsection
@section('content')
<h3 class="text-center mt-5 mb-4 pb-4">Upload</h3>
@if (\Session::has('success'))
<div class="alert alert-success" role="alert">
    {!! \Session::get('success') !!}
</div>
@endif

@if (\Session::has('error'))
<div class="alert alert-danger" role="alert">
    {!! \Session::get('error') !!}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($berkasPengguna !== null && $berkasPengguna->ktp !== null && $berkasPengguna->transkip_nilai !== null && $berkasPengguna->ijazah !== null && $berkasPengguna->npwp !== null)
<div class="alert alert-success" role="alert">
    Anda sudah mengupload seluruh berkas. Jika ingin mengganti berkas, silakan pilih berkas lalu tekan tombol 'Simpan'.
</div>
@endif

<div class="row mt-4">


    <form action="{{ route('uploadBerkas') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>KTP</label>
            <input type="file" class="form-control-file" accept="application/pdf" name="ktp">
        </div>
        @if ($berkasPengguna !== null && $berkasPengguna->ktp !== null)
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-xs-1"><img src="img/file.png" class="img-responsive" alt="Some picture" width="20" height="20"></div>
                <div class="col">
                    <p><a href="{{ asset('berkas_pengguna/' . $berkasPengguna->ktp) }}" target="_blank" rel="noopener noreferrer">{{ $berkasPengguna->ktp }}</a></p>
                </div>
            </div>
        </div>
        @endif

        <div class="form-group">
            <label>Transkrip Nilai</label>
            <input type="file" class="form-control-file" accept="application/pdf" name="transkip_nilai">
        </div>
        @if ($berkasPengguna !== null && $berkasPengguna->transkip_nilai !== null)
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-xs-1"><img src="img/file.png" class="img-responsive" alt="Some picture" width="20" height="20"></div>
                <div class="col">
                    <p><a href="{{ asset('berkas_pengguna/' . $berkasPengguna->transkip_nilai) }}" target="_blank" rel="noopener noreferrer">{{ $berkasPengguna->transkip_nilai }}</a></p>
                </div>
            </div>
        </div>
        @endif

        <div class="form-group">
            <label>Ijazah</label>
            <input type="file" class="form-control-file" accept="application/pdf" name="ijazah">
        </div>
        @if ($berkasPengguna !== null && $berkasPengguna->ijazah !== null)
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-xs-1"><img src="img/file.png" class="img-responsive" alt="Some picture" width="20" height="20"></div>
                <div class="col">
                    <p><a href="{{ asset('berkas_pengguna/' . $berkasPengguna->ijazah) }}" target="_blank" rel="noopener noreferrer">{{ $berkasPengguna->ijazah }}</a></p>
                </div>
            </div>
        </div>
        @endif

        <div class="form-group">
            <label>NPWP</label>
            <input type="file" class="form-control-file" accept="application/pdf" name="npwp">
        </div>
        @if ($berkasPengguna !== null && $berkasPengguna->npwp !== null)
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-xs-1"><img src="img/file.png" class="img-responsive" alt="Some picture" width="20" height="20"></div>
                <div class="col">
                    <p><a href="{{ asset('berkas_pengguna/' .  $berkasPengguna->npwp) }}" target="_blank" rel="noopener noreferrer">{{ $berkasPengguna->npwp }}</a></p>
                </div>
            </div>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>

@endsection