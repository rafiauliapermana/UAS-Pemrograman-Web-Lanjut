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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengguna</th>
                        <th>KTP</th>
                        <th>Transkip Nilai</th>
                        <th>Ijazah</th>
                        <th>NPWP</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaBerkas as $index => $berkas)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $berkas->pengguna->nama }}</td>
                        <td>
                            <a href="{{ asset('berkas_pengguna/' . $berkas->ktp) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Periksa <i class="mx-1 fas fa-search"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ asset('berkas_pengguna/' . $berkas->transkip_nilai) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Periksa <i class="mx-1 fas fa-search"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ asset('berkas_pengguna/' . $berkas->ijazah) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Periksa <i class="mx-1 fas fa-search"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ asset('berkas_pengguna/' . $berkas->npwp) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                Periksa <i class="mx-1 fas fa-search"></i>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-success"
                            data-toggle="modal"
                            data-target="#modalPengumuman"
                            data-link="{{ route('buatPengumuman', $berkas->id) }}"
                            data-tanggal="{!! !empty($berkas->pengumuman->tanggal) ? $berkas->pengumuman->tanggal : '' !!}"
                            data-waktu="{!! !empty($berkas->pengumuman->waktu) ? $berkas->pengumuman->waktu : '' !!}"
                            data-pelaksanaan_ujian="{!! !empty($berkas->pengumuman->pelaksanaan_ujian) ? $berkas->pengumuman->pelaksanaan_ujian : '' !!}"
                            data-tempat="{!! !empty($berkas->pengumuman->tempat) ? $berkas->pengumuman->tempat : '' !!}"
                            >
                            Pengumuman
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPengumuman" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" name="formPengumuman">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="time" name="waktu" class="form-control" id="waktu">
                    </div>
                    <div class="form-group">
                        <label>Pelaksanaan Ujian</label>
                        <input type="text" name="pelaksanaan_ujian" class="form-control" id="pelaksanaan_ujian">
                    </div>
                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" name="tempat" class="form-control" id="tempat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('sb_admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('sb_admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable()
    });

    $('#modalPengumuman').on('show.bs.modal', function(event) {
        const tombol = $(event.relatedTarget)
        const linkPengumuman = tombol.data('link')
        const modal = $(this)

        document.formPengumuman.action = linkPengumuman

        modal.find('#tanggal').val(tombol.data('tanggal'))
        modal.find('#waktu').val(tombol.data('waktu'))
        modal.find('#pelaksanaan_ujian').val(tombol.data('pelaksanaan_ujian'))
        modal.find('#tempat').val(tombol.data('tempat'))
    })
</script>
@endsection