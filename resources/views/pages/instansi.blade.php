@extends('layouts.app')
@section('content')
<div class="penerima-section mt-4 pt-4">
    <h3 class="text-center mt-2 mb-4 pb-4">Daftar Instansi</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telpon</th>
                <th scope="col">Website</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semuaInstansi as $index => $instansi)
            <tr>
                <th scope="row">{{ ++$index }}</th>
                <td>{{ $instansi->nama_instansi }}</td>
                <td>{{ $instansi->alamat_instansi }}</td>
                <td>{{ $instansi->no_telp_instansi }}</td>
                <td><a href="{{ $instansi->link_instansi }}">{{ $instansi->link_instansi }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection