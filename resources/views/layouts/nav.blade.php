<nav class="md:flex md:justify-between md:items-center">
    <div>
        <a href="/">
            <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">

        @auth
            <span class="text-xs font-bold uppercase mx-2 pt-1">Welcome, {{ auth()->user()->username }}</span>
            <form method="POST" action="/logout">
                @csrf
                <button class="text-xs font-bold uppercase mx-2">Logout</button>
            </form>
        @endauth

        @guest
            <a href="/login" class="text-xs font-bold uppercase mx-2">Sign In</a>
            <a href="/register" class="text-xs font-bold uppercase mx-2">Register</a>
        @endguest

        <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
            Subscribe for Updates
        </a>
    </div>
</nav>
