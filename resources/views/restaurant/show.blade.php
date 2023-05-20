@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    @vite(['resources/css/swiper.css'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('main')
    <a class="z-10transition-all absolute top-24 left-5 hover:-translate-x-1 md:left-10" href="{{ url()->previous() }}">
        <svg class="icon icon-tabler icon-tabler-arrow-left stroke-my-white" xmlns="http://www.w3.org/2000/svg" width="24"
             height="24" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l14 0"></path>
            <path d="M5 12l6 6"></path>
            <path d="M5 12l6 -6"></path>
        </svg>
    </a>
    <div
         class="page-container mx-auto flex w-screen flex-col gap-y-10 px-5 py-20 text-my-white md:px-10 md:py-10 xl:w-[1000px] xl:px-20">
        <section class="flex w-full flex-col gap-y-5 text-my-white" id="restaurant-show">
            <h1 class="text-4xl font-bold md:text-5xl">{{ $restaurant['name'] }}</h1>
            <div class="flex flex-col gap-x-5 gap-y-5 md:flex-row" id="restaurant-show__container">
                <img class="col-span-1 aspect-square w-72 rounded-lg"
                     src="{{ asset('img/' . $restaurant['image'] . '.png') }}" alt="">
                <div id="restaurant-show__detail">
                    <div class="flex h-full flex-col gap-y-4">
                        <div class="flex flex-none gap-x-5">
                            <div class="h-fit w-24 overflow-hidden rounded-lg border-2 border-my-white text-lg font-semibold text-slate-800"
                                 id="restaurant-show__rating">
                                <p class="flex h-10 items-center justify-center bg-orange text-my-white md:w-24">Rating</p>
                                <div class="flex h-12 items-center justify-center bg-my-white md:w-24">
                                    {{ $restaurant['rating'] }}
                                </div>
                            </div>
                            <div class="flex flex-col gap-y-2 font-semibold" id="restaurant-show__address">
                                <div class="flex items-center gap-x-2" id="address">
                                    <svg class="icon icon-tabler icon-tabler-map-pin" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        <path
                                              d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                        </path>
                                    </svg>
                                    {{ $restaurant['address'] }}, {{ $restaurant['city'] }}
                                </div>
                                <div class="flex items-center gap-x-2" id="open_hours">
                                    <svg class="icon icon-tabler icon-tabler-clock-hour-4"
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                        <path d="M12 12l3 2"></path>
                                        <path d="M12 7v5"></path>
                                    </svg>
                                    {{ $restaurant['open_hours'] }}
                                </div>
                                <div class="flex items-center gap-x-2" id="payment-method">
                                    <svg class="icon icon-tabler icon-tabler-cash" xmlns="http://www.w3.org/2000/svg"
                                         width="50" height="50" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                              d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                        </path>
                                        <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                                    </svg>
                                    @if ($restaurant['non_tunai'])
                                        <svg class="icon icon-tabler icon-tabler-qrcode" xmlns="http://www.w3.org/2000/svg"
                                             width="40" height="40" viewBox="0 0 24 24" stroke-width="2"
                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                  d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                            </path>
                                            <path d="M7 17l0 .01"></path>
                                            <path
                                                  d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                            </path>
                                            <path d="M7 7l0 .01"></path>
                                            <path
                                                  d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                            </path>
                                            <path d="M17 7l0 .01"></path>
                                            <path d="M14 14l3 0"></path>
                                            <path d="M20 14l0 .01"></path>
                                            <path d="M14 14l0 3"></path>
                                            <path d="M14 20l3 0"></path>
                                            <path d="M17 17l3 0"></path>
                                            <path d="M20 17l0 3"></path>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex h-full w-full flex-1 gap-x-5">
                            <button
                                    class="h-fit rounded-lg border-2 border-my-white p-2 font-semibold transition-all hover:-translate-y-1">Lihat
                                Menu</button>
                            <div class="h-full flex-1 rounded-lg bg-slate-500" id="map">google map</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex w-full flex-col gap-y-5 text-my-white">
            <h2 class="text-3xl">Gallery</h2>
            <div class="swiper h-56">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper flex h-full items-center justify-center rounded-lg">
                    <!-- Slides -->
                    <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c1.jpg') }}"
                             alt=""></div>
                    <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c2.jpg') }}"
                             alt=""></div>
                    <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c3.jpg') }}"
                             alt=""></div>
                    <div class="swiper-slide h-full overflow-hidden rounded-lg"><img src="{{ asset('img/c3.jpg') }}"
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
        </section>
    </div>
@endsection

@section('script')
    @vite(['resources/js/swiperInit.js'])
@endsection
