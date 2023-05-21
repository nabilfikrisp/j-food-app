<aside class="w-64 bg-brown-400 text-my-white shadow">
    <div class="mt-8 flex flex-col items-center justify-center gap-y-4 text-slate-800">
        <a class="min-w-20 block text-teal-600" href="{{ route('home') }}">
            <span class="sr-only">Home</span>
            <img class="h-10" src="{{ asset('img/logo.png') }}" srcset="" alt="">
        </a>
        <p class="text-xl font-semibold text-my-white">Hi,
            {{ auth()->user()->username ? auth()->user()->username : 'Admin' }}!</p>
    </div>

    <nav class="mt-10">
        <a class="mt-4 flex items-center py-2 px-6 text-my-white transition-all hover:translate-x-1 hover:bg-my-white hover:text-brown-400"
           href="{{ route('admin.dashboard') }}">
            <svg class="icon icon-tabler icon-tabler-dashboard" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                <path d="M13.45 11.55l2.05 -2.05"></path>
                <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
            </svg>
            <span class="mx-3">Dashboard</span>
        </a>

        <a class="mt-4 flex items-center py-2 px-6 text-my-white transition-all hover:translate-x-1 hover:bg-my-white hover:text-brown-400"
           href="{{ route('admin.restaurant.index') }}">
            <svg class="icon icon-tabler icon-tabler-tools-kitchen-2" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M19 3v12h-5c-.023 -3.681 .184 -7.406 5 -12zm0 12v6h-1v-3m-10 -14v17m-3 -17v3a3 3 0 1 0 6 0v-3">
                </path>
            </svg>
            <span class="mx-3">Restaurants</span>
        </a>

        <a class="mt-4 flex items-center py-2 px-6 text-my-white transition-all hover:translate-x-1 hover:bg-my-white hover:text-brown-400"
           href="#">
            <svg class="icon icon-tabler icon-tabler-users" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
            </svg>
            <span class="mx-3">Users</span>
        </a>
    </nav>
</aside>
