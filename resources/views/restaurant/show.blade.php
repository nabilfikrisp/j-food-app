@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" rel="stylesheet"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @vite(['resources/css/swiper.css'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('main')
    <a class="z-10transition-all absolute top-24 left-5 hover:-translate-x-1 md:left-10"
       href="{{ route('restaurant.index') }}">
        <svg class="icon icon-tabler icon-tabler-arrow-left stroke-my-white" xmlns="http://www.w3.org/2000/svg" width="24"
             height="24" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke-linecap="round"
             stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l14 0"></path>
            <path d="M5 12l6 6"></path>
            <path d="M5 12l6 -6"></path>
        </svg>
    </a>
    <div class="page-container mx-auto flex w-screen flex-col gap-y-10 px-5 py-20 text-my-white md:px-10 md:py-10 xl:w-[1000px] xl:px-20"
         id="show-container">
        @if (session('error'))
            <div class="border-s-4 rounded border-red-500 bg-red-50 p-4" role="alert">
                <p class="mt-2 text-sm text-red-700">
                    {{ session('error') }}
                </p>
            </div>
        @endif
        <section class="flex w-full flex-col gap-y-5 text-my-white" id="restaurant-show">
            <h1 class="text-4xl font-bold md:text-5xl">{{ $restaurant['name'] }}</h1>
            <div class="flex flex-col gap-x-5 gap-y-5 md:flex-row" id="restaurant-show__container">
                <img class="col-span-1 aspect-square w-96 rounded-lg object-contain bg-my-white"
                     src="{{ $restaurant['image'] == null ? asset('img/Frame70.png') : asset('storage/' . $restaurant['image']) }}"
                     alt="">
                <div class="flex-1" id="restaurant-show__detail">
                    <div class="flex h-full flex-col gap-y-4">
                        <div class="flex flex-none gap-x-5">
                            <div class="h-fit w-24 overflow-hidden rounded-lg border-2 border-my-white text-lg font-semibold text-slate-800"
                                 id="restaurant-show__rating">
                                <p class="flex h-10 items-center justify-center bg-orange text-my-white md:w-24">Rating</p>
                                <div class="flex h-12 items-center justify-center bg-my-white md:w-24">
                                    {{ $restaurant['rating'] ?? '-' }}
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
                        <div class="flex h-full w-full flex-1 flex-col gap-y-5 gap-x-5 md:flex-row">
                            <!-- Base -->

                            <button class="group relative inline-block h-fit bg-black text-sm font-medium text-my-white focus:outline-none focus:ring active:text-my-white"
                                    id="menu-btn">
                                <span
                                      class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-brown-200 transition-transform group-hover:translate-y-0 group-hover:translate-x-0"></span>

                                <span class="relative block border border-current bg-orange px-4 py-2 font-semibold">
                                    Lihat Menu
                                </span>
                            </button>
                            <div class="z-10 aspect-video !h-full flex-1 rounded-lg bg-slate-500" id="map">
                                a
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex w-full flex-col gap-y-5 text-my-white">

            <h2 class="text-3xl">Gallery</h2>
            @if ($restaurant->restaurant_images->count() > 0)
                <div class="swiper mySwiper1 h-56">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex h-full rounded-lg">
                        <!-- Slides -->
                        @foreach ($restaurant->restaurant_images as $image)
                            <div class="swiper-slide h-full overflow-hidden rounded-lg"><img class="object-contain"
                                     src="{{ asset('storage/' . $image->url) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination text-orange"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev text-white"></div>
                    <div class="swiper-button-next text-white"></div>
                </div>
            @else
                <div>
                    Belum ada foto dari restoran ini
                </div>
            @endif
        </section>

        <section class="fixed top-1/2 left-1/2 z-30 hidden w-screen -translate-x-1/2 -translate-y-1/2 transform rounded-lg border border-my-white bg-orange p-8 sm:w-96"
                 id="menu-popups">
            @if ($restaurant->restaurant_images->where('type', '=', 'menu')->count() > 0)
                <div class="swiper mySwiper2 flex w-full items-center justify-center">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper flex h-full items-center rounded-lg">
                        <!-- Slides -->
                        @foreach ($restaurant->restaurant_images->where('type', '=', 'menu') as $image)
                            <div class="swiper-slide h-full w-full overflow-hidden rounded-lg"><img
                                     class="h-full w-full object-contain" src="{{ asset('storage/' . $image->url) }}"
                                     alt="">
                            </div>
                        @endforeach
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev text-white"></div>
                    <div class="swiper-button-next text-white"></div>
                </div>
            @else
                <div>
                    Belum ada foto menu dari restoran ini
                </div>
            @endif
        </section>
        <section class="flex flex-col items-center gap-y-5 text-my-white" id="reviews-section">

            <form class="bg-orange-400 w-full rounded-lg p-6 shadow-lg" action="{{ route('review.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <input name="restaurant_id" type="text" value="{{ $restaurant->id }}" hidden>
                <h3 class="mb-4 text-xl font-semibold">Berikan tanggapan Anda terhadap restoran ini</h3>
                <div class="mb-4 flex flex-col justify-between gap-y-4">
                    <span class="w-1/2 text-base font-semibold">Rating</span>
                    <div class="star-rating !m-0">
                        <input id="star-a" name="rating" type="radio" value="5" />
                        <label for="star-a"></label>

                        <input id="star-b" name="rating" type="radio" value="4" />
                        <label for="star-b"></label>

                        <input id="star-c" name="rating" type="radio" value="3" />
                        <label for="star-c"></label>

                        <input id="star-d" name="rating" type="radio" value="2" />
                        <label for="star-d"></label>

                        <input id="star-e" name="rating" type="radio" value="1" />
                        <label for="star-e"></label>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-my-white" for="comment">Ulasan:</label>
                    <textarea class="w-full rounded border border-gray-300 px-3 py-2 text-slate-800" id="comment" name="comment"
                              rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="mb-2 block font-semibold text-my-white" for="images">Tambahkan gambar Anda:</label>
                    <div class="bg-orange-200 border-orange-400 relative flex h-40 w-full flex-col items-center justify-center rounded-lg border-2 border-dashed"
                         id="dropzone">
                        <div class="text-center" id="dropzone-content">
                            <span class="text-orange-600 font-medium" id="dropzone-text">Drag and drop images here or
                                click to upload</span>
                        </div>
                        <div class="mt-2" id="file-names"></div>
                        <input class="hidden" id="images" name="images[]" type="file" multiple>
                    </div>
                </div>

                <button class="rounded bg-my-white py-2 px-4 font-semibold text-orange transition-all hover:translate-y-1"
                        type="submit">Submit Review</button>
            </form>
        </section>
        <section class="py-8" id="customer-reviews">
            @foreach ($restaurant->reviews as $review)
                <div class="mb-4 rounded-lg bg-slate-100 shadow-md">
                    <div class="p-6">
                        <div class="mb-4 flex items-center justify-between">
                            <div class="text-lg font-semibold text-gray-900">{{ $review->user->username }}</div>
                            <div class="flex items-center">
                                <div class="ml-2 flex items-center text-yellow-400">
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                        <svg class="icon icon-tabler icon-tabler-star-filled"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                  stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    @endfor
                                    @for ($i = $review->rating + 1; $i <= 5; $i++)
                                        <svg class="icon icon-tabler icon-tabler-star" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                  d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                            </path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>

                        </div>
                        <div class="mb-4 text-gray-800">{{ $review->comment }}</div>

                        <!-- Review Images -->
                        @if ($review->review_images->count() > 0)
                            <div>
                                <div class="swiper mySwiper3 h-56">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper flex h-full rounded-lg">
                                        <!-- Slides -->
                                        @foreach ($review->review_images as $image)
                                            <div class="swiper-slide h-full overflow-hidden rounded-lg"><img
                                                     class="w-full rounded-lg"
                                                     src="{{ asset('storage/' . $image->url) }}" alt="Review Image">
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev text-white"></div>
                                    <div class="swiper-button-next text-white"></div>
                                </div>
                                {{-- @foreach ($review->review_images as $image)
                                <img class="w-full rounded-lg" src="{{ asset('storage/' . $image->url) }}"
                                     alt="Review Image">
                            @endforeach --}}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </section>

    </div>
    <div class="fixed inset-0 hidden bg-black opacity-50" id="blur-overlay"></div>
@endsection

@section('script')
    @vite(['resources/js/menuButton.js'])
    @vite(['resources/js/dragAndDrop.js'])
    <script>
        let swiper = new Swiper(".mySwiper1", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 2,
                },
                // when window width is >= 480px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                // when window width is >= 640px
                820: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
            },
        });

        let swiper2 = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 2,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        let swiper3 = new Swiper(".mySwiper3", {
            slidesPerView: 3,
            spaceBetween: 2,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 2,
                },
                // when window width is >= 480px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                // when window width is >= 640px
                820: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
            },
        });

        const lat = @json($restaurant['latitude']) ? @json($restaurant['latitude']) : -6.935083;
        const long = @json($restaurant['longitude']) ? @json($restaurant['longitude']) : 107.766838;

        let map = L.map('map').setView([lat, long], 15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        if (@json($restaurant['latitude'])) {
            let marker = L.marker([lat, long]).addTo(map);
        }
    </script>
@endsection
