@extends('layouts.app')
@section('main')
    <div class="page-container flex w-full flex-col gap-y-10 px-20 py-10">
        <section class="relative flex flex-col justify-center sm:flex-row" id="restaurant-index__navigation">
            <a class="absolute top-0 -left-10 z-10 transition-all hover:-translate-x-1 md:left-0"
               href="{{ url()->previous() }}">
                <svg class="icon icon-tabler icon-tabler-arrow-left stroke-my-white" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>

            <form class="mb-0 flex w-full max-w-sm items-center justify-center" method="GET"
                  action="{{ route('restaurant.search') }}">
                <div class="relative w-full max-w-sm">
                    <input class="h-10 w-full rounded-lg border-gray-200 text-sm placeholder-gray-300 focus:z-10"
                           name="search" type="text" placeholder="Search..." />

                    <div class="end-0 absolute inset-y-0 flex items-center justify-center" id="search-navigation">
                        <div class="absolute top-12 z-10 hidden w-72 flex-col gap-10 rounded-lg bg-slate-300/70 p-4"
                             id="filter-content">
                            <div class="mb-4 flex flex-row justify-between gap-x-4">
                                <span class="w-1/2 text-sm">Rating</span>
                                <div class="star-rating">
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
                            <div class="mb-4 flex flex-row gap-x-4">
                                <span class="w-1/2 text-sm">Start Price</span>
                                <div class="flex justify-between gap-4">
                                    <label class="flex items-center gap-2" for="FilterPriceTo">
                                        <span class="text-sm text-gray-600">$</span>

                                        <input class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm"
                                               id="FilterPriceTo" name="start_price" type="number" placeholder="from" />
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4 flex flex-row gap-x-4">
                                <span class="w-1/2 text-sm">Sort Rating</span>
                                <div class="flex justify-between gap-4">
                                    <fieldset class="flex flex-row gap-3">

                                        <div>
                                            <input class="peer hidden" id="rating-descending" name="rating_sort"
                                                   type="radio" value="desc" />

                                            <label class="flex cursor-pointer items-center justify-center rounded-md border border-gray-100 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white"
                                                   for="rating-descending">
                                                <p class="text-sm font-medium">Highest</p>
                                            </label>
                                        </div>

                                        <div>
                                            <input class="peer hidden" id="rating-ascending" name="rating_sort"
                                                   type="radio" value="asc" />

                                            <label class="flex cursor-pointer items-center justify-center rounded-md border border-gray-100 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white"
                                                   for="rating-ascending">
                                                <p class="text-sm font-medium">Lowest</p>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="mb-4 flex flex-row gap-x-4">
                                <span class="w-1/2 text-sm">Sort Price</span>
                                <div class="flex justify-between gap-4">
                                    <fieldset class="flex flex-row gap-3">

                                        <div>
                                            <input class="peer hidden" id="price-descending" name="price_sort"
                                                   type="radio" value="desc" />

                                            <label class="flex cursor-pointer items-center justify-center rounded-md border border-gray-100 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white"
                                                   for="price-descending">
                                                <p class="text-sm font-medium">Highest</p>
                                            </label>
                                        </div>

                                        <div>
                                            <input class="peer hidden" id="price-ascending" name="price_sort"
                                                   type="radio" value="asc" />

                                            <label class="flex cursor-pointer items-center justify-center rounded-md border border-gray-100 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white"
                                                   for="price-ascending">
                                                <p class="text-sm font-medium">Lowest</p>
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            {{-- <div class="flex flex-row gap-x-4">
                                <span>rating</span>
                                <input type="text">
                            </div> --}}
                        </div>
                        <button class="inset-y-0 rounded-r-lg p-2 text-gray-600" id="filter-button" type="button">
                            <span class="sr-only">Filter</span>
                            <svg class="icon icon-tabler icon-tabler-filter" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                      d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z">
                                </path>
                            </svg>
                        </button>
                        <button class="inset-y-0 rounded-r-lg p-2 text-gray-600" type="submit">
                            <span class="sr-only">Submit Search</span>
                            <svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </section>
        <section class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4" id="restaurants">
            @foreach ($restaurants as $restaurant)
                <a class="block rounded-lg bg-brown-100 p-4 text-my-white shadow-sm shadow-brown-200 transition-all hover:-translate-y-2"
                   href="{{ route('restaurant.show', $restaurant['id']) }}">
                    <img class="aspect-[15/16] w-full rounded-md object-cover"
                         src="{{ asset('img/' . $restaurant['image'] . '.png') }}" alt="{{ $restaurant['name'] }}" />
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
        </section>
        {{ $restaurants->links() }}
    </div>
@endsection

@section('script')
    @vite(['resources/js/filter.js'])
@endsection
