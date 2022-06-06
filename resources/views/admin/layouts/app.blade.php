<!DOCTYPE html>
<html lang="en">
@include('admin.partials.header')

<body id="page-top">
    <div id="wrapper">
        @include('admin.partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.partials.topbar')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.footer')
</body>

</html>