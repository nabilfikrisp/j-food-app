@extends('layouts.app')
@section('main')
    <div class="min-w-screen bg-orange">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg">
                @if ($errors->any())
                    <div class="p-4 sm:p-6 lg:p-8">
                        <div class="border-s-4 rounded-lg border-red-500 bg-red-50 p-4" role="alert">
                            <div class="flex flex-col items-center gap-2 gap-y-4 text-red-800">
                                @foreach ($errors->all() as $error)
                                    <div class="flex">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                             fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                                  clip-rule="evenodd" />
                                        </svg>

                                        <strong class="block font-medium"> {{ $error }} </strong>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('error'))
                    <div class="p-4 sm:p-6 lg:p-8">
                        <div class="border-s-4 rounded-lg border-red-500 bg-red-50 p-4" role="alert">
                            <div class="flex flex-col items-center gap-2 gap-y-4 text-red-800">
                                <div class="flex">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                              clip-rule="evenodd" />
                                    </svg>

                                    <strong class="block font-medium"> {{ session('error') }} </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <h1 class="text-center text-2xl font-bold text-white sm:text-3xl">
                    Register
                </h1>
                <form class="mb-0 space-y-4 rounded-lg p-4 sm:p-6 lg:p-8" action="{{ route('register.handle') }}"
                      method="POST">
                    @csrf
                    <div class="flex gap-x-4">
                        <div>
                            <label class="text-white" for="first-name">First Name</label>

                            <div class="relative">
                                <input class="pe-12 w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm"
                                       name="first_name" type="text" required placeholder="First Name" />
                            </div>
                        </div>
                        <div>
                            <label class="text-white" for="email">Last Name</label>

                            <div class="relative">
                                <input class="pe-12 w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm"
                                       name="last_name" type="text" required placeholder="Last Name" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="text-white" for="username">Username</label>

                        <div class="relative">
                            <input class="pe-12 w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm" name="username"
                                   type="text" required placeholder="Username" />
                        </div>
                    </div>
                    <div>
                        <label class="text-white" for="email">Email</label>

                        <div class="relative">
                            <input class="pe-12 w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm" name="email"
                                   type="email" required placeholder="Enter email" />
                        </div>
                    </div>

                    <div>
                        <label class="text-white" for="password">Password</label>

                        <div class="relative">
                            <input class="pe-12 w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm" name="password"
                                   type="password" required placeholder="Enter password" />
                        </div>
                    </div>

                    <div>
                        <label class="text-white" for="password_confirmation">Confirm Password</label>

                        <div class="relative">
                            <input class="pe-12 w-full rounded-lg border-gray-200 p-4 text-sm shadow-sm"
                                   name="password_confirmation" type="password" required placeholder="Confirm Password" />
                        </div>
                    </div>

                    <button class="block w-full rounded-lg bg-brown-100 px-5 py-3 text-sm font-medium text-white hover:bg-brown-100/80"
                            type="submit">
                        Register
                    </button>

                    <p class="text-center text-sm text-white">
                        Already a member?
                        <a class="underline" href="{{ route('login') }}">Log in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
