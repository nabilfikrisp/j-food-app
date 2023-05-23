<nav class="sticky top-0 z-30 w-full opacity-90">
    <header class="bg-brown-400" aria-label="Site Header">
        <div class="mx-auto flex h-16 max-w-screen-xl items-center justify-between gap-8 px-4 sm:px-6 lg:px-8">
            <a class="min-w-20 block text-teal-600" href="/">
                <span class="sr-only">Home</span>
                <img class="h-10" src="{{ asset('img/logo.png') }}" srcset="" alt="">
            </a>

            <div class="flex items-center justify-end gap-x-8 md:justify-between">
                <div class="flex items-center gap-4">
                    <div class="hidden items-center sm:flex sm:gap-4">
                        <nav class="md:block" aria-label="Site Nav">
                            <ul class="flex items-center gap-6 text-sm">
                                @if (auth()->user())
                                    @if (auth()->user()->role == 'A')
                                        <li>
                                            <a class="text-orange transition duration-300 hover:text-orange/75"
                                               href="{{ route('admin.dashboard') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                    @endif
                                @endif
                                <li>
                                    <a class="text-orange transition duration-300 hover:text-orange/75"
                                       href="{{ route('restaurant.index') }}">
                                        Restaurant
                                    </a>
                                </li>
                                <li>
                                    <a class="text-orange transition duration-300 hover:text-orange/75" href="/">
                                        Community
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        @auth
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="block rounded-md bg-orange px-5 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-orange/75"
                                        type="submit">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a class="block rounded-md bg-orange px-5 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-orange/75"
                               href="{{ route('login') }}">
                                Login
                            </a>

                            <a class="rounded-md bg-my-white px-5 py-2.5 text-sm font-medium text-orange transition duration-300 hover:bg-my-white/75 hover:text-orange/75 sm:block"
                               href="{{ route('register') }}">
                                Register
                            </a>
                        @endauth

                    </div>

                    <div class="relative block rounded bg-gray-100 text-gray-600 transition hover:text-gray-600/75 sm:hidden"
                         x-data="{ isActive: false }">
                        <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                            <button class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700"
                                    x-on:click="isActive = !isActive">
                                <span class="sr-only">Menu</span>
                                <svg class="icon icon-tabler icon-tabler-menu" xmlns="http://www.w3.org/2000/svg"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="orange"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 8l16 0"></path>
                                    <path d="M4 16l16 0"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="end-0 absolute z-10 mt-4 w-40 rounded-md border border-gray-100 bg-white shadow-lg"
                             role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false"
                             x-on:keydown.escape.window="isActive = false">
                            <div class="p-2">
                                <a class="block rounded-lg px-4 py-2 text-sm text-orange hover:bg-brown-300"
                                   href="{{ route('restaurant.index') }}" role="menuitem">
                                    Trending
                                </a>
                                <a class="block rounded-lg px-4 py-2 text-sm text-orange hover:bg-brown-300"
                                   href="#" role="menuitem">
                                    Community
                                </a>
                                <a class="block rounded-lg px-4 py-2 text-sm text-orange hover:bg-brown-300"
                                   href="#" role="menuitem">
                                    Login
                                </a>
                                <a class="block rounded-lg px-4 py-2 text-sm text-orange hover:bg-brown-300"
                                   href="#" role="menuitem">
                                    Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
</nav>
