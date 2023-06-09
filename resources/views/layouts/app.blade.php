<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           @include('partials.header')
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <p>&copy; {{ date('Y') }} Your Website. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
