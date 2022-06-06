<!DOCTYPE html>
<html lang="en">
@include('partials.header')

<body>
    <div class="container index-section">
        <div class="head-section">
            @include('partials.navbar')
        </div>

        <div class="index-section container mt-4">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>
</body>

</html>