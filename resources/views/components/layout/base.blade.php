<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body>
    <main class="flex flex-col min-h-screen">
        {{ $slot }}
    </main>

    <!-- Preloader HTML -->
    <div id="asg_pl_preloader">
        <div class="asg_pl_spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Footer Section -->
    <footer class="text-center">

        <!-- Footer Bottom -->
        <hr>
        <div class="footer-bottom text-center">
            <p>&copy; 2023-{{ date('Y') }} gauranshika.com All Rights Reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('asg_pl_preloader');
            preloader.style.display = 'none';
        });
    </script>
</body>

</html>
