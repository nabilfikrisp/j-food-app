<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link type="image/icon type" href="{{ asset('img/logo.png') }}" rel="icon">

    <!-- Fonts -->
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <!-- Link Swiper's CSS -->
    @yield('link')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="flex min-h-screen flex-col bg-orange">
        </nav>
        <!-- Page Content -->
        <main class="flex-1">
            <div class="flex min-h-screen">
                <!-- Sidebar -->
                @include('admin.layouts.sidebar')

                <!-- Main Content -->
                <main class="box-border flex-1 bg-slate-200">
                    @yield('admin-main')
                </main>
            </div>
        </main>
    </div>

    @yield('script')
</body>

</html>
