@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    @vite(['resources/css/swiper.css'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('main')
    <section class="relative bg-[url('../../public/img/pancake.png')] bg-cover bg-center bg-no-repeat">
        <div class="lg:h-screen/2 relative mx-auto w-screen max-w-screen-xl items-center px-4 py-32 sm:px-6 lg:flex lg:px-8">
            <div class="w-full text-center">
                <h1 class="text-3xl font-extrabold text-my-white sm:text-5xl">
                    Let us find your
                    <strong class="block font-extrabold text-orange">
                        Taste.
                    </strong>
                </h1>
                <div class="mt-8 flex flex-wrap items-center justify-center gap-4 text-center">
                    <form class="mb-0 flex w-full max-w-sm items-center justify-center"
                          action="{{ route('restaurant.search') }}" method="GET">
                        @csrf
                        <div class="relative w-full max-w-sm">
                            <input class="h-10 w-full rounded-lg border-gray-200 text-sm placeholder-gray-300 focus:z-10"
                                   name="search" type="text" placeholder="Search..." />

                            <button class="end-0 absolute inset-y-0 rounded-r-lg p-2 text-gray-600" type="submit">
                                <span class="sr-only">Submit Search</span>
                                <svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full bg-orange px-5 py-10">
        <div class="mx-auto flex flex-col gap-y-10 sm:max-w-4xl">
            <div
                 class="flex h-full w-full flex-col gap-y-5 rounded-lg bg-[url('../../public/img/Frame69.png')] bg-cover bg-center bg-no-repeat p-5 text-white">
                <h2 class="text-2xl font-semibold sm:text-3xl">Introduce our feature community</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur architecto quam ipsum enim accusantium.
                    Iusto nihil illum quia perspiciatis omnis?</p>
                <a class="flex w-fit items-center gap-x-2 divide-x-2 rounded-md bg-white px-2 py-1 text-center text-slate-700 hover:bg-my-white"
                   href="{{ route('discussion.index') }}">
                    <p class="text-sm">Community</p>
                    <svg class="icon icon-tabler icon-tabler-chevron-right" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </a>
            </div>

            <div class="mb-5 flex flex-col gap-y-5">
                <h2 class="text-2xl font-semibold text-white sm:text-3xl">Top Picks</h2>
                <div class="swiper h-56">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex h-full rounded-lg">
                        <!-- Slides -->
                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c1.jpg') }}"
                                 alt=""></div>
                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c2.jpg') }}"
                                 alt=""></div>
                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c3.jpg') }}"
                                 alt=""></div>
                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c4.jpg') }}"
                                 alt=""></div>
                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c5.jpg') }}"
                                 alt=""></div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination text-orange"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev text-white"></div>
                    <div class="swiper-button-next text-white"></div>
                </div>
            </div>
            <div
                 class="flex h-full w-full flex-col gap-y-5 rounded-lg bg-[url('../../public/img/Frame69.png')] bg-cover bg-center bg-no-repeat p-5 text-white">
                <h2 class="text-2xl font-semibold sm:text-3xl">Start your journey with JFOOD</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur architecto quam ipsum enim accusantium.
                    Iusto nihil illum quia perspiciatis omnis?</p>
                <a class="flex w-fit items-center gap-x-2 divide-x-2 rounded-md bg-orange px-2 py-1 text-center text-white hover:bg-orange/80"
                   href="{{ route('restaurant.index') }}">
                    <p>Start Now</p>
                    <svg class="icon icon-tabler icon-tabler-chevron-right" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 6l6 6l-6 6"></path>
                    </svg>
                </a>
            </div>
            <div class="flex h-full w-full flex-col gap-y-5 rounded-lg p-5 text-white">
                <h2 class="text-center text-2xl font-bold sm:text-3xl">Fresh From the Oven</h2>
                <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3" id="cards">
                    @foreach ($restaurants as $restaurant)
                        <a class="block rounded-lg bg-brown-100 p-4 text-my-white shadow-sm shadow-brown-200 transition-all hover:-translate-y-2"
                           href="{{ route('restaurant.show', $restaurant['id']) }}">
                            <img class="aspect-[15/16] w-full rounded-md object-cover"
                                 src="{{ $restaurant['image'] == null ? asset('img/Frame70.png') : $restaurant['image'] }}"
                                 alt="{{ $restaurant['name'] }}" />
                            <div class="mt-2">
                                <dl>
                                    <div>
                                        <dt class="sr-only">Name</dt>

                                        <dd class="text-xl font-semibold">{{ $restaurant['name'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="sr-only">Address</dt>

                                        <dd class="text-xs">{{ $restaurant['address'] }}, {{ $restaurant['city'] }}</dd>
                                    </div>
                                </dl>

                                <div class="mt-6 grid grid-cols-2 gap-8 text-xs">
                                    <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                                        <div class="mt-1.5 sm:mt-0">
                                            <p class="font-semibold text-my-white">Price Start From</p>

                                            <p class="font-medium">Rp. {{ $restaurant['price_start'] }}</p>
                                        </div>
                                    </div>
                                    <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">

                                        <div class="mt-1.5 sm:mt-0">
                                            <p class="font-semibold text-my-white">Rating</p>

                                            <p class="flex gap-x-1 font-medium">
                                                <span class="flex items-center">
                                                    <svg class="icon icon-tabler icon-tabler-star-filled"
                                                         xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                              stroke-width="0" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                {{ $restaurant['rating'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @vite(['resources/js/swiperInit.js'])
@endsection
