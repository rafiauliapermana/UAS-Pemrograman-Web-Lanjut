@extends('layouts.app')
@section('content')
<div class="row mt-4">
    <div class="col-12 col-md-5 mb-4">
        <div class="mx-2 mt-4 pt-4 left-section">
            <h3>Selamat Datang Di</h3>
            <h3>GO-EMPLOYEES</h3>
            <button class="mt-4 btn btn-sm"><span class="mx-2 font-weight-bold">Download petunjuk alur pendaftaran</span></button>
        </div>
    </div>
    <div class="col-12 col-md-7 mb-4 mt-4 right-section">
        <img src="{{ asset('assets/img/home-team.svg') }}" alt="home-image">
    </div>
</div>
@endsection