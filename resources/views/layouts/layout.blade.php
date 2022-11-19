<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.js"
    integrity="sha512-1fAkW3wqng/WNu86nQEgW3/RuPns2JxdC6WwCFJhqB/fL9VIWduIJmktYGrlBu99aoxwmWKCLY4AHlzDsh6LqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        @include('layouts.nav')

        @yield('content')

        @include('layouts.footer')

        <x-flash />

    </section>
</body>
