<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }} - {{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('blog') }}/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    @include('blog.layout.navbar')
    <!-- Page header with logo and tagline-->
    {{-- jika user resques home tampilkan aside --}}
    @if (Request::is('/'))
        @include('blog.layout.aside')
    @endif
    <!-- Page content-->
    <div class="container">
        <div class="row">
            @yield('content')
            <!-- Side widgets-->
            @if (Request::is('/'))
                @include('blog.layout.side')
            @endif
        </div>
    </div>
    <!-- Footer-->
    {{-- *jika user request login maka tampilkan footer saja --}}

    @include('blog.layout.footer')


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('blog/js/scripts.js') }}"></script>
</body>

</html>
