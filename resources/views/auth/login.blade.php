@extends('layouts.app')
@section('main')
    <section class="mt-20 mb-20 min-h-max flex-1 bg-orange text-white">
        <div class="px-8 lg:grid lg:min-h-full lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img class="absolute inset-0 h-full w-full" src="{{ asset('img/login.svg') }}" alt="Pattern" />
            </aside>

            <main class="flex items-center justify-center lg:col-span-7 xl:col-span-6" aria-label="Main">
                <div class="w-96 max-w-xl lg:max-w-3xl">
                    @if (session('success'))
                        <div class="alert mb-5 flex items-center justify-between gap-x-2 rounded-lg bg-emerald-600 p-4"
                             role="alert" x-cloak x-show="showAlert" x-data="{ showAlert: true }">
                            {{ session('success') }}
                            <button class="button rounded-md !bg-emerald-700 p-2" @click="showAlert = false">Close</button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert mb-5 flex items-center justify-between gap-x-2 rounded-lg bg-rose-600 p-4"
                             role="alert" x-cloak x-show="showAlert" x-data="{ showAlert: true }">
                            {{ session('error') }}
                            <button class="button rounded-md !bg-rose-700 p-2" @click="showAlert = false">Close</button>
                        </div>
                    @endif

                    <h1 class="w-full text-center text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Login
                    </h1>
                    <form class="grid w-full grid-cols-6 gap-6" action="{{ route('login.handle') }}" method="POST">
                        @csrf
                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-white" for="Email">
                                Email
                            </label>

                            <input class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                   id="Email" name="email" type="email" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label class="block text-sm font-medium text-white" for="Password">
                                Password
                            </label>

                            <input class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                                   id="Password" name="password" type="password" />
                        </div>

                        <div class="col-span-6 flex-col sm:flex sm:items-center sm:gap-4">
                            <button
                                    class="inline-block w-full shrink-0 rounded-md border border-brown-400 bg-brown-300 px-12 py-3 text-sm font-medium text-white transition hover:bg-brown-300/80 focus:outline-none focus:ring active:text-blue-500">
                                Login
                            </button>

                            <p class="mt-4 text-sm text-white sm:mt-0">
                                Not a member?
                                <a class="text-white underline transition-all duration-300 hover:text-brown-400"
                                   href="{{ route('register') }}">Register Now</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
@endsection
