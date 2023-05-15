@extends('layouts.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

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
                    <form class="mb-0 flex w-full max-w-sm items-center justify-center">
                        <div class="relative w-full max-w-sm">
                            <input class="h-10 w-full rounded-lg border-gray-200 text-sm placeholder-gray-300 focus:z-10"
                                   type="text" placeholder="Search..." />

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
                 class="flex h-full w-full flex-col gap-y-5 rounded-lg bg-[url('../../public/img/Frame-69.png')] bg-cover bg-center bg-no-repeat p-5 text-white">
                <h2 class="text-2xl font-semibold sm:text-3xl">Introduce our feature community</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur architecto quam ipsum enim accusantium.
                    Iusto nihil illum quia perspiciatis omnis?</p>
                <a class="flex w-fit items-center gap-x-2 divide-x-2 rounded-md bg-white px-2 py-1 text-center text-slate-700 hover:bg-my-white"
                   href="">
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
                    <div class="swiper-wrapper h-full">
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
                 class="flex h-full w-full flex-col gap-y-5 rounded-lg bg-[url('../../public/img/Frame-69.png')] bg-cover bg-center bg-no-repeat p-5 text-white">
                <h2 class="text-2xl font-semibold sm:text-3xl">Start your journey with JFOOD</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur architecto quam ipsum enim accusantium.
                    Iusto nihil illum quia perspiciatis omnis?</p>
                <a class="flex w-fit items-center gap-x-2 divide-x-2 rounded-md bg-orange px-2 py-1 text-center text-white hover:bg-orange/80"
                   href="">
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
                    @for ($i = 0; $i < 3; $i++)
                        <div class="card w-full sm:max-w-sm overflow-hidden rounded-lg text-white shadow-lg mx-auto">
                            <img class="w-full" src="{{ asset('img/Rectangle10.png') }}" alt="Sunset in the mountains">
                            <div class="bg-brown-200">
                                <div class="px-6 pt-4">
                                    <div class="mb-2 text-xl font-bold">KFC</div>
                                    <p class="text-base font-semibold">
                                        <span>"</span>
                                        Rajanya ayam Goreng
                                        <span>"</span>
                                    </p>
                                </div>
                                <div class="flex items-center gap-x-2 px-6 pt-4 pb-4">
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
                                    Jatos
                                </div>
                            </div>

                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: 3,
            spaceBetween: 1,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 2
                },
                // when window width is >= 480px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                // when window width is >= 640px
                820: {
                    slidesPerView: 3,
                    spaceBetween: 10
                }
            },
        });
    </script>
@endsection
