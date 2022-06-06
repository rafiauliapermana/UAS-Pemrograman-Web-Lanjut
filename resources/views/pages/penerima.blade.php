@extends('layouts.app')
@section('content')
<div class="penerima-section mt-4 pt-4">
    <h3 class="text-center mt-2 mb-4 pb-4">Penerimaan</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Penerimaan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Catatan</th>
                <th scope="col">Status</th>
                <th scope="col">Cetak</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semuaPenerimaan as $index => $penerimaan)
            <tr>
                <th scope="row">{{ ++$index }}</th>
                <td>{{ $penerimaan->kode_penerimaan }}</td>
                <td>{{ $penerimaan->tanggal_penerimaan }}</td>
                <td>{{ $penerimaan->catatan_penerimaan }}</td>
                <td>{{ $penerimaan->status_penerimaan }}</td>
                <td><a href="{{ asset('berkas_penerimaan/' . $penerimaan->berkas_penerimaan) }}" class="btn btn-primary"><span class="mx-2">Cetak</span></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection