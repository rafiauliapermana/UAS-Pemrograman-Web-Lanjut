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
                        <th>Nama Instansi</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Link Website</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaInstansi as $index => $instansi)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $instansi->nama_instansi }}</td>
                        <td>{{ $instansi->alamat_instansi }}</td>
                        <td>{{ $instansi->no_telp_instansi }}</td>
                        <td>{{ $instansi->link_instansi }}</td>
                        <td>
                            <form onsubmit="return confirm('Hapus data {{ $instansi->nama_instansi }}?');" action="{{ route('instansiDestroy', $instansi->id) }}" method="POST">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubahData-{{ $instansi->id }}">Ubah</button>

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
                <h5 class="modal-title">Tambah Data Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('instansiStore') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_instansi" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_instansi" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="no_telp_instansi" required>
                    </div>
                    <div class="form-group">
                        <label>Link Website</label>
                        <input type="text" class="form-control" name="link_instansi" required>
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
@foreach ($semuaInstansi as $index => $instansi)
<div class="modal fade" id="ubahData-{{ $instansi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('instansiUpdate', $instansi->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_instansi" value="{{ $instansi->nama_instansi }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat_instansi" value="{{ $instansi->alamat_instansi }}" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="no_telp_instansi" value="{{ $instansi->no_telp_instansi }}" required>
                    </div>
                    <div class="form-group">
                        <label>Link Website</label>
                        <input type="text" class="form-control" name="link_instansi" value="{{ $instansi->link_instansi }}" required>
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