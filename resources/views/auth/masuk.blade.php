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
                    <form action="{{ route('prosesMasuk') }}" method="POST">
                        @csrf
                        <div class="content-login justify-content-center text-center">
                            <b>GO-EMPLOYES LOGIN</b>
                            <p class="text-muted">Hai Selamat Datang Silahkan Login</p>
                            <div class="input-login text-center mx-4 mt-4 pt-2">
                                <input type="email" placeholder="Masukkan email" class="form-control rounded-button text-center mb-2" name="email" value="{{ old('email') }}">
                                <input type="password" placeholder="Masukkan password" class="form-control rounded-button text-center mb-2" name="password">
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button class="col-11 btn mb-3">Login</button>
                            <p>Atau login dengan</p>
                            <div class="text-center google-login">
                                <a href="{{ route('googleLogin') }}" class="btn btn-outline-primary border border-1 shadow-sm">
                                    <span class="mb-4 pb-4 mx-2">
                                        <span>Google</span>
                                    </span>
                                </a>
                            </div>
                            <div class="mx-4 mt-4 bottom-login">
                                <p class="text-muted">Tidak punya akun ? Silahkan <a href="{{ route('daftar') }}"><u><b>Daftar</b></u></a></p>
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