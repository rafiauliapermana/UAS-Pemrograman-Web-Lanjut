<!DOCTYPE html>
<html lang="en">
@include('partials.header')

<body>
    <div class="login-section container-fluid">
        <div class="d-flex justify-content-center body-section">
            <div class="bg-white col-12 col-md-4 login-box shadow-sm mb-4 pb-4">
                <div class="col-12 mt-4 mb-4">
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

                    <form action="{{ route('prosesDaftar') }}" method="POST">
                        @csrf
                        <div class="content-login justify-content-center text-center">
                            <b>GO-EMPLOYES REGISTER</b>
                            <p class="text-muted">Silahkan lengkapi data berikut.</p>

                            <div class="input-login text-center mx-4 mt-4 pt-2">
                                <input type="text" placeholder="Masukkan nama lengkap" class="form-control rounded-button text-center mb-2" name="nama" value="{{old('nama')}}">

                                <input type="text" placeholder="Masukkan alamat" class="form-control rounded-button text-center mb-2" name="alamat" value="{{old('alamat')}}">

                                <input type="mail" placeholder="Masukkan email" class="form-control rounded-button text-center mb-2" name="email" value="{{old('email')}}">

                                <input type="password" placeholder="Masukkan password" class="form-control rounded-button text-center mb-4" name="password">

                                <label class="text-muted">Tanggal lahir</label>
                                <input type="date" class="form-control rounded-button text-center mb-2" placeholder="Masukkan tanggal lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">

                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="col-11 btn mb-3">Daftar</button>
                            <div class="mx-4 mt-4 bottom-login">
                                <p class="text-muted">Kembali ke <a href="{{ route('masuk') }}"><u><b>login</b></u></a></p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</body>

</html>