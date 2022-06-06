<nav class="navbar navbar-expand-lg navbar-light header-section mt-4 border-bottom border-dark">
    <a class="navbar-brand" href="#">GO-EMPLOYEES</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('instansi') }}">Daftar Instansi</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('upload') }}">Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('penerima') }}">Penerima</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengumuman') }}">Pengumuman</a>
            </li>
            @endauth
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                @auth
                <li class="nav-item">
                    <div class="dropdown">
                        <span class="nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hallo, {{ Auth::user()->nama }}
                        </span>
                        <div class="dropdown-menu float-sm-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('keluar') }}">Logout</a>
                        </div>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('masuk') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftar') }}">Register</a>
                </li>
                @endauth
            </ul>
        </form>
    </div>
</nav>