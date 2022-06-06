@extends('layouts.app')
@section('content')
<div class="pengumuman-section mt-4 pt-4">
    <h3 class="text-center">Pengumuman</h3>
    @if ($pengumuman !== null)
    <div class="text-pengumuman-section mx-2 text-justify mt-4 pt-4">
        <h2>Selamat</h2>
        <p> Berdasarkan hasil seleksi berkas pendaftaran yang masuk dalam rangka Pengadaan Pegawai Pemerintah<br />Non Pegawai Negeri (PPNPN), diumumkan bahwa peserta sesuai lampiran dinyatakan Lulus Seleksi<br /> Administrasi dan selanjutnya dapat mengikuti tes wawancara dengan membawa bukti pendaftaran dan<br /> Kartu Tanda Penduduk (KTP) asli pada : </p>
        <br />
        <p>
            Hari/Tanggal &emsp; :{{ $pengumuman->hari . '/' . $pengumuman->tanggal }}<br />
            Waktu Registrasi &emsp; :{{ $pengumuman->waktu }} s.d selesai<br />
            Pelaksanaan Ujian &emsp;:{{ $pengumuman->pelaksanaan_ujian }}<br />
            Tempat &emsp; : {{ $pengumuman->tempat }}
        </p>
    </div>
    @else
    <div class="text-pengumuman-section mx-2 text-justify mt-4 pt-4">
        <div class="alert alert-primary">Belum ada pengumuman. Silakan periksa lagi nanti.</div>
    </div>
    @endif
</div>
@endsection