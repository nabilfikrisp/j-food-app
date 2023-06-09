@extends('discussion.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    @vite(['resources/css/swiper.css'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('main')
    <div class="min-h-screen bg-orange">
        @include('discussion.sidebar')

        <div class="flex flex-col-reverse">
            <div class="mx-auto min-h-screen w-full bg-white px-6 py-4 shadow md:w-[800px]">
                @if (session('success'))
                    <div class="mb-4 rounded-xl border border-b-8 border-r-4 bg-slate-100 p-4" role="alert">
                        <div class="flex items-start gap-4">
                            <span class="text-green-600">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>

                            <div class="flex-1">
                                <strong class="block font-medium text-gray-900"> Berhasil </strong>

                                <p class="mt-1 text-sm text-gray-700">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mb-4 w-full rounded-lg border-b-8 border-r-4 bg-slate-100 p-4 px-6">
                    <form action="{{ route('discussion.search') }}" method="GET">
                        @csrf
                        <div class="flex space-x-4">
                            <div class="flex w-full gap-x-1 overflow-hidden rounded-md">
                                <button
                                        class="overflow-hidden rounded-l-xl bg-orange px-5 py-4 text-lg font-semibold text-white transition-all hover:translate-x-1">
                                    <svg class="icon icon-tabler icon-tabler-search" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                        <path d="M21 21l-6 -6"></path>
                                    </svg>
                                </button>
                                <input class="w-full rounded-r-xl border outline-none focus:border-orange" name="search"
                                       type="text" placeholder="Cari disuksi dari judul, isi, #hashtag..." />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mb-10 flex gap-x-4 rounded-lg border-b-8 border-r-4 bg-slate-100 p-6">
                    <div>
                        <img class="h-10 w-10 rounded-full" src="{{ asset('img/no-profile.jpg') }}" alt="">
                    </div>
                    <div class="flex-1">
                        <form action="{{ route('discussion.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="user_id" type="text" value="{{ auth()->user()->id }}" hidden>
                            <div class="mb-4">
                                <label class="block text-lg font-medium text-brown-400" for="title">Judul</label>
                                <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none"
                                       id="title" name="title" type="text" placeholder="Judul Diskusi">
                                @error('title')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-lg font-medium text-brown-400" for="content">Diskusi</label>
                                <textarea class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none"
                                          id="content" name="content" rows="4" placeholder="Isi diskusi"></textarea>
                                @error('content')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-lg font-medium text-brown-400" for="hashtags">Hashtags</label>
                                <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none"
                                       id="forum_category" name="forum_category" type="text"
                                       placeholder="Tambahkan hashtag">
                                @error('forum_category')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 flex w-fit flex-row items-center justify-center gap-x-4">
                                <div class="file-input-container transition-all hover:translate-y-1">
                                    <input class="hidden" id="images" name="images[]" type="file" multiple>
                                    <label class="file-input-icon" for="images">
                                        <svg class="icon icon-tabler icon-tabler-photo" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 8h.01"></path>
                                            <path
                                                  d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z">
                                            </path>
                                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                            <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3"></path>
                                        </svg>
                                    </label>
                                </div>
                                @error('images')
                                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                                @enderror
                                <span class="text-sm" id="selected-file-indicator"></span>
                            </div>
                            <div class="flex justify-end">
                                <button class="rounded-lg bg-brown-400 px-4 py-2 text-my-white hover:bg-brown-300"
                                        type="submit">Unggah</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div>
                    @if (isset($mostLiked))
                        <ul>
                            <h1 class="m-2 text-xl font-semibold text-slate-600">Paling Disukai</h1>
                            @foreach ($mostLiked as $discussion)
                                <li class="mb-4 w-full rounded-lg border-b-8 border-r-4 bg-slate-100 p-4 pr-12">
                                    <div class="flex text-brown-400"
                                         href="{{ route('discussion.show', $discussion->id) }}">
                                        <div class="mr-4 h-12 w-12 overflow-hidden rounded-full bg-brown-200">
                                            <img class="object-contain" src="{{ asset('img/profile.jpeg') }}"
                                                 alt="">
                                        </div>
                                        <div class="discussion-container flex w-3/4 flex-1 flex-col">
                                            <div class="flex justify-between">
                                                <h2 class="font-semibold">{{ $discussion->user->first_name }}
                                                    {{ $discussion->user->last_name }}</h2>
                                                <p class="text-sm text-slate-400">{{ $discussion->created_at->diffForHumans() }}</p>
                                            </div>

                                            <h3 class="mb-4 text-gray-600">@ {{ $discussion->user->username }}</h3>
                                            <a class="line-clamp-2 mb-2 text-2xl font-bold hover:text-slate-500"
                                               href="{{ route('discussion.show', $discussion->id) }}">{{ $discussion->title }}</a>
                                            <p class="line-clamp-6 mb-2">{{ $discussion->body }}</p>
                                            @if ($discussion->thread_images->count() > 0)
                                                <div class="swiper mySwiper mb-4 h-56 w-full">
                                                    <!-- Additional required wrapper -->
                                                    <div class="swiper-wrapper flex h-full rounded-lg">
                                                        <!-- Slides -->
                                                        @foreach ($discussion->thread_images as $image)
                                                            <div class="swiper-slide h-full overflow-hidden rounded-lg">
                                                                <img class="w-full rounded-lg"
                                                                     src="{{ asset('storage/' . $image->url) }}"
                                                                     alt="Review Image">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <!-- If we need navigation buttons -->
                                                    <div class="swiper-button-prev text-white"></div>
                                                    <div class="swiper-button-next text-white"></div>
                                                </div>
                                            @endif
                                            <a class="mb-2 text-sm text-blue-500 hover:text-blue-400"
                                               href="#">#{{ $discussion->forumCategory->name }}</a>
                                            <div class="flex flex-row gap-x-4">
                                                <a href="{{ route('discussion.show', $discussion->id) }}">
                                                    <div class="flex items-center justify-center gap-x-1">
                                                        <svg class="icon icon-tabler icon-tabler-message-circle-2"
                                                             xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24" viewBox="0 0 24 24" stroke-width="2"
                                                             stroke="currentColor" fill="none" stroke-linecap="round"
                                                             stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                                        </svg>
                                                        {{ $discussion->comments->count() }} comments
                                                    </div>
                                                </a>
                                                <div class="discussion flex items-center justify-center gap-x-1"
                                                     data-discussion-id="{{ $discussion->id }}">
                                                    <svg class="icon icon-tabler icon-tabler-heart like-button @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) hidden @endif"
                                                         id="like-button-{{ $discussion->id }}"
                                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                              d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                        </path>
                                                    </svg>
                                                    <svg class="icon icon-tabler icon-tabler-heart-filled unlike-button @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() == 0) hidden @endif"
                                                         id="unlike-button-{{ $discussion->id }}"
                                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z"
                                                              stroke-width="0" fill="currentColor"></path>
                                                    </svg>

                                                    <span
                                                          id="like-count-{{ $discussion->id }}">{{ $discussion->likes->count() }}</span>
                                                    likes
                                                </div>
                                                <form id="unlike-form-{{ $discussion->id }}"
                                                      action="/like/delete/@if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) {{ $discussion->likes->where('user_id', '=', auth()->user()->id)->first()->id }} @endif"
                                                      method="POST" hidden>
                                                    @csrf
                                                    <input id="discussion_thread_id_input" name="discussion_thread_id"
                                                           type="text" value="{{ $discussion->id }}" hidden>
                                                    <input id="user_id_input" name="user_id" type="text"
                                                           value="{{ auth()->user()->id }}" hidden>
                                                </form>

                                                <form id="like-form-{{ $discussion->id }}"
                                                      action="{{ route('like.store') }}" hidden>
                                                    @csrf
                                                    <input id="discussion_thread_id_input" name="discussion_thread_id"
                                                           type="text" value="{{ $discussion->id }}" hidden>
                                                    <input id="user_id_input" name="user_id" type="text"
                                                           value="{{ auth()->user()->id }}" hidden>
                                                </form>
                                            </div>
                                        </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <ul>
                        <h1 class="m-2 mt-8 text-xl font-semibold text-slate-600">Terbaru</h1>
                        @foreach ($discussions as $discussion)
                            <li class="mb-4 w-full rounded-lg border-b-8 border-r-4 bg-slate-100 p-4 pr-12">
                                <div class="flex text-brown-400" href="{{ route('discussion.show', $discussion->id) }}">
                                    <div class="mr-4 h-12 w-12 overflow-hidden rounded-full bg-brown-200">
                                        <img class="object-contain" src="{{ asset('img/profile.jpeg') }}"
                                             alt="">
                                    </div>
                                    <div class="discussion-container flex w-3/4 flex-1 flex-col">
                                        <div class="flex justify-between">
                                            <h2 class="font-semibold">{{ $discussion->user->first_name }}
                                                {{ $discussion->user->last_name }}</h2>
                                            <p class="text-sm text-slate-400">{{ $discussion->created_at->diffForHumans() }}</p>
                                        </div>
                                        <h3 class="mb-4 text-gray-600">@ {{ $discussion->user->username }}</h3>
                                        <a class="line-clamp-2 mb-2 text-2xl font-bold hover:text-slate-500"
                                           href="{{ route('discussion.show', $discussion->id) }}">{{ $discussion->title }}</a>
                                        <p class="line-clamp-6 mb-2">{{ $discussion->body }}</p>
                                        @if ($discussion->thread_images->count() > 0)
                                            <div class="swiper mySwiper mb-4 h-56 w-full">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper flex h-full rounded-lg">
                                                    <!-- Slides -->
                                                    @foreach ($discussion->thread_images as $image)
                                                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img
                                                                 class="w-full rounded-lg"
                                                                 src="{{ asset('storage/' . $image->url) }}"
                                                                 alt="Review Image">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev text-white"></div>
                                                <div class="swiper-button-next text-white"></div>
                                            </div>
                                        @endif
                                        <a class="mb-2 text-sm text-blue-500 hover:text-blue-400"
                                           href="#">#{{ $discussion->forumCategory->name }}</a>
                                        <div class="flex flex-row gap-x-4">
                                            <a href="{{ route('discussion.show', $discussion->id) }}">
                                                <div class="flex items-center justify-center gap-x-1">
                                                    <svg class="icon icon-tabler icon-tabler-message-circle-2"
                                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                                    </svg>
                                                    {{ $discussion->comments->count() }} comments
                                                </div>
                                            </a>
                                            <div class="discussion flex items-center justify-center gap-x-1"
                                                 data-discussion-id="{{ $discussion->id }}">
                                                <svg class="icon icon-tabler icon-tabler-heart like-button @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) hidden @endif"
                                                     id="like-button-{{ $discussion->id }}"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                          d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                    </path>
                                                </svg>
                                                <svg class="icon icon-tabler icon-tabler-heart-filled unlike-button @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() == 0) hidden @endif"
                                                     id="unlike-button-{{ $discussion->id }}"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z"
                                                          stroke-width="0" fill="currentColor"></path>
                                                </svg>

                                                <span
                                                      id="like-count-{{ $discussion->id }}">{{ $discussion->likes->count() }}</span>
                                                likes
                                            </div>
                                            <form id="unlike-form-{{ $discussion->id }}"
                                                  action="/like/delete/@if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) {{ $discussion->likes->where('user_id', '=', auth()->user()->id)->first()->id }} @endif"
                                                  method="POST" hidden>
                                                @csrf
                                                <input id="discussion_thread_id_input" name="discussion_thread_id"
                                                       type="text" value="{{ $discussion->id }}" hidden>
                                                <input id="user_id_input" name="user_id" type="text"
                                                       value="{{ auth()->user()->id }}" hidden>
                                            </form>

                                            <form id="like-form-{{ $discussion->id }}"
                                                  action="{{ route('like.store') }}" hidden>
                                                @csrf
                                                <input id="discussion_thread_id_input" name="discussion_thread_id"
                                                       type="text" value="{{ $discussion->id }}" hidden>
                                                <input id="user_id_input" name="user_id" type="text"
                                                       value="{{ auth()->user()->id }}" hidden>
                                            </form>
                                        </div>
                                    </div>
                            </li>
                        @endforeach
                        {{ $discussions->links() }}
                    </ul>
                </div>

            </div>
            <ul
                class="static right-0 top-0 mx-auto w-full max-w-[800px] space-y-1 bg-brown-400 p-4 text-my-white xl:fixed xl:w-60 xl:rounded-bl-xl">
                <h1 class="text-center text-xl font-semibold">Trending</h1>
                <div class="flex flex-row flex-wrap items-center justify-center xl:flex-col">
                    @foreach ($trending as $trend)
                        <li>
                            <a class="block rounded-lg px-4 py-2 text-center text-lg font-medium text-blue-400 hover:translate-x-1"
                               href="{{ route('category.myIndex', $trend->id) }}">
                                <span>#</span>{{ $trend->name }}
                            </a>
                        </li>
                    @endforeach
                </div>

            </ul>
        </div>

    @endsection

    @section('script')
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
                crossorigin="anonymous"></script>
        <script>
            const fileInput = document.getElementById('images');
            const fileIndicator = document.getElementById('selected-file-indicator');

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length > 0) {
                    fileIndicator.textContent = `${fileInput.files.length} file(s) selected`;
                } else {
                    fileIndicator.textContent = '';
                }
            });

            let swiper = new Swiper(".mySwiper", {
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

            $(document).ready(function() {
                $('.like-button').on('click', async function() {

                    const discussionId = $(this).closest('.discussion').data('discussion-id');


                    const likeButton = $(`#like-button-${discussionId}`);
                    const unlikeButton = $(`#unlike-button-${discussionId}`);
                    const likeForm = $(`#like-form-${discussionId}`);
                    const unlikeForm = $(`#unlike-form-${discussionId}`);
                    const likeCountElement = $(`#like-count-${discussionId}`);

                    try {
                        const response = await $.post(likeForm.attr('action'), likeForm.serialize());


                        likeButton.addClass('liked').addClass('hidden');
                        unlikeButton.removeClass('hidden');
                        const currentLikeCount = parseInt(likeCountElement.text());
                        likeCountElement.text(currentLikeCount + 1);


                        unlikeForm.attr('action', '/like/delete/' + response.like_id);


                        unlikeForm.show();
                    } catch (error) {
                        console.error('An error occurred:', error);
                    }
                });

                $('.unlike-button').on('click', async function() {

                    const discussionId = $(this).closest('.discussion').data('discussion-id');


                    const likeButton = $(`#like-button-${discussionId}`);
                    const unlikeButton = $(`#unlike-button-${discussionId}`);
                    const likeForm = $(`#like-form-${discussionId}`);
                    const unlikeForm = $(`#unlike-form-${discussionId}`);
                    const likeCountElement = $(`#like-count-${discussionId}`);


                    try {
                        const response = await $.ajax({
                            url: unlikeForm.attr('action'),
                            type: 'POST',
                            data: unlikeForm.serialize(),
                        });


                        likeButton.removeClass('liked');
                        unlikeButton.addClass('hidden');
                        likeButton.removeClass('hidden');
                        const currentLikeCount = parseInt(likeCountElement.text());
                        likeCountElement.text(currentLikeCount - 1);
                    } catch (error) {
                        console.error('An error occurred:', error);
                    }
                });
            });
        </script>
    @endsection
