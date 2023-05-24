<aside class="sidebar hidden min-h-screen w-64 bg-brown-400 py-10 text-my-white shadow fixed">
    <div class="mb-6 flex flex-col items-center justify-center gap-y-4 text-slate-800">
        <a class="min-w-20 block text-teal-600" href="{{ route('home') }}">
            <span class="sr-only">Home</span>
            <img class="h-10" src="{{ asset('img/logo.png') }}" srcset="" alt="">
        </a>
    </div>

    <div class="flex items-center gap-x-4 px-6">
        <img class="h-10 w-10 rounded-full" src="{{ asset('img/no-profile.jpg') }}" alt="">
        <div class="flex flex-col">
            <p class="font-semibold text-my-white">
                {{ auth()->user()->username ? auth()->user()->first_name : 'Admin' }}
                {{ auth()->user()->username ? auth()->user()->last_name : 'Admin' }}</p>
            <p class="text-my-white">
                @ {{ auth()->user()->username ? auth()->user()->username : 'Admin' }}</p>
        </div>
    </div>

    <nav class="">
        <a class="mt-4 flex items-center py-2 px-6 text-my-white transition-all hover:translate-x-1 hover:bg-my-white hover:text-brown-400"
           href="">
            <svg class="icon icon-tabler icon-tabler-home" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
            </svg>
            <span class="mx-3">Beranda</span>
        </a>

        <a class="mt-4 flex items-center py-2 px-6 text-my-white transition-all hover:translate-x-1 hover:bg-my-white hover:text-brown-400"
           href="">
            <svg class="icon icon-tabler icon-tabler-user-circle" xmlns="http://www.w3.org/2000/svg" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
            </svg>
            <span class="mx-3">Profile</span>
        </a>
    </nav>
</aside>
<button class="hover:bg-brown-500 focus:bg-brown-500 fixed top-10 left-0 rounded-r-lg bg-brown-400 p-2 text-my-white transition-all focus:outline-none"
        id="sidebarToggle">
    <svg class="icon icon-tabler icon-tabler-square-arrow-right" id="sidebar-toggle-right"
         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 16l4 -4l-4 -4"></path>
        <path d="M8 12h8"></path>
        <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
    </svg>
    <svg class="icon icon-tabler icon-tabler-square-arrow-left hidden" id="sidebar-toggle-left"
         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 8l-4 4l4 4"></path>
        <path d="M16 12h-8"></path>
        <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
    </svg>
</button>
