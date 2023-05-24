@extends('discussion.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    @vite(['resources/css/swiper.css'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@endsection
@section('main')
    <div class="min-h-screen bg-orange">
        @include('discussion.sidebar')
        <div class="mx-auto min-h-screen w-[800px] bg-my-white px-6 py-4 shadow">
            <div class="mb-10 flex gap-x-4 rounded-lg bg-slate-200 p-6">
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
                        </div>
                        <div class="mb-4">
                            <label class="block text-lg font-medium text-brown-400" for="content">Diskusi</label>
                            <textarea class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none"
                                      id="content" name="content" rows="4" placeholder="Isi diskusi"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-lg font-medium text-brown-400" for="hashtags">Hashtags</label>
                            <input class="w-full rounded-lg border border-brown-300 px-4 py-2 focus:border-brown-400 focus:outline-none"
                                   id="forum_category" name="forum_category" type="text" placeholder="Tambahkan hashtag">
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
                            <span class="text-sm text-gray-500" id="selected-file-indicator"></span>
                        </div>
                        <div class="flex justify-end">
                            <button class="rounded-lg bg-brown-400 px-4 py-2 text-my-white hover:bg-brown-300"
                                    type="submit">Unggah</button>
                        </div>
                    </form>

                </div>
            </div>
            <div>
                <ul>
                    @foreach ($discussions as $discussion)
                        <li class="mb-4 w-full rounded-lg bg-slate-200 p-4">
                            <div class="flex text-brown-400" href="{{ route('discussion.show', $discussion->id) }}">
                                <div class="mr-4 h-10 w-10 rounded-lg bg-brown-200"></div>
                                <div class="discussion-container flex w-3/4 flex-1 flex-col">
                                    <h2 class="font-semibold">{{ $discussion->user->first_name }}
                                        {{ $discussion->user->last_name }}</h2>
                                    <h3 class="mb-4 text-gray-600">@ {{ $discussion->user->username }}</h3>
                                    <a class="mb-2 text-2xl font-bold hover:text-slate-500"
                                       href="{{ route('discussion.show', $discussion->id) }}">{{ $discussion->title }}</a>
                                    <p class="mb-2">{{ $discussion->body }}</p>
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
                                    <a class="text-sm text-blue-500 hover:text-blue-400 mb-2"
                                       href="#">#{{ $discussion->forumCategory->name }}</a>
                                    <a class="flex gap-x-4" href="{{ route('discussion.show', $discussion->id) }}">
                                        <div class="flex items-center justify-center gap-x-1">
                                            <svg class="icon icon-tabler icon-tabler-message-circle-2"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                 stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                            </svg>
                                            {{ $discussion->comments->count() }} comments
                                        </div>

                                        <div class="flex items-center justify-center gap-x-1">
                                            <svg class="icon icon-tabler icon-tabler-heart @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) hidden @endif"
                                                 id="like-button" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" stroke-width="2"
                                                 stroke="currentColor" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                      d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                </path>
                                            </svg>
                                            <svg class="icon icon-tabler icon-tabler-heart-filled @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() == 0) hidden @endif"
                                                 id="unlike-button" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" stroke-width="2"
                                                 stroke="currentColor" fill="none" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z"
                                                      stroke-width="0" fill="currentColor"></path>
                                            </svg>

                                            <span id="like-count">{{ $discussion->likes->count() }}</span> likes
                                        </div>
                                    </a>
                                </div>
                        </li>
                    @endforeach
                    {{ $discussions->links() }}
                </ul>
            </div>

        </div>
    @endsection

    @section('script')
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
        </script>
    @endsection
