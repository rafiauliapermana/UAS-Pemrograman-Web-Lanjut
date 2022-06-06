@extends('admin.layouts.app')

@section('css')
<link href="{{ asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
</div>

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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Penerimaan</th>
                        <th>Tanggal</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaPenerimaan as $index => $penerimaan)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $penerimaan->kode_penerimaan }}</td>
                        <td>{{ $penerimaan->tanggal_penerimaan }}</td>
                        <td>{{ $penerimaan->catatan_penerimaan }}</td>
                        <td>{{ $penerimaan->status_penerimaan }}</td>
                        <td>
                            <form onsubmit="return confirm('Hapus data {{ $penerimaan->kode_penerimaan }}?');" action="{{ route('penerimaanDestroy', $penerimaan->id) }}" method="POST">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubahData-{{ $penerimaan->id }}">Ubah</button>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penerimaanStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Penerimaan</label>
                        <input type="text" class="form-control" name="kode_penerimaan" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_penerimaan" required>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" class="form-control" name="catatan_penerimaan" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_penerimaan" class="form-control">
                            <option value="Proses">Proses</option>
                            <option value="Terima">Terima</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berkas</label>
                        <input type="file" class="form-control-file" name="berkas_penerimaan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Ubah Data -->
@foreach($semuaPenerimaan as $penerimaan)
<div class="modal fade" id="ubahData-{{ $penerimaan->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penerimaanUpdate', $penerimaan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Penerimaan</label>
                        <input type="text" class="form-control" name="kode_penerimaan" value="{{ $penerimaan->kode_penerimaan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_penerimaan" value="{{ $penerimaan->tanggal_penerimaan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <input type="text" class="form-control" name="catatan_penerimaan" value="{{ $penerimaan->catatan_penerimaan }}" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_penerimaan" class="form-control">
                            <option {{ $penerimaan->status_penerimaan == 'Proses' ? 'selected' : '' }} value="Proses">Proses</option>
                            <option {{ $penerimaan->status_penerimaan == 'Terima' ? 'selected' : '' }} value="Terima">Terima</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Berkas <br/><code>Pilih berkas jika ingin ubah berkas.</code></label>
                        <input type="file" class="form-control-file" name="berkas_penerimaan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('js')
<script src="{{ asset('sb_admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable()
    });
</script>
@endsection