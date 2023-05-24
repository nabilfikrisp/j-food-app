@extends('discussion.app')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet" />
    @vite(['resources/css/swiper.css'])
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('main')
    <div class="min-h-screen bg-orange">
        @include('discussion.sidebar')
        <div class="mx-auto flex min-h-screen w-[800px] flex-col bg-my-white px-6 py-4 shadow">
            <a class="mb-4 w-fit transition-all hover:-translate-x-1" href="{{ route('discussion.index') }}">
                <svg class="icon icon-tabler icon-tabler-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="mb-4 h-fit w-full rounded-lg bg-slate-200 p-4">
                <div class="flex text-brown-400">
                    <div class="mr-4 h-10 w-10 rounded-lg bg-brown-200"></div>
                    <div class="discussion-container flex w-3/4 flex-1 flex-col">
                        <h2 class="font-semibold">{{ $discussion->user->first_name }}
                            {{ $discussion->user->last_name }}</h2>
                        <h3 class="mb-4 text-gray-600">@ {{ $discussion->user->username }}</h3>
                        <h1 class="mb-2 w-full text-xl font-bold">{{ $discussion->title }}</h1>
                        <p class="mb-2 w-full">{{ $discussion->body }}</p>
                        @if ($discussion->thread_images->count() > 0)
                            <div class="swiper mySwiper mb-4 h-56 w-full">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper flex h-full rounded-lg">
                                    <!-- Slides -->
                                    @foreach ($discussion->thread_images as $image)
                                        <div class="swiper-slide h-full overflow-hidden rounded-lg"><img
                                                 class="w-full rounded-lg" src="{{ asset('storage/' . $image->url) }}"
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
                        <div class="flex gap-x-4">
                            <div class="flex items-center justify-center gap-x-1">
                                <svg class="icon icon-tabler icon-tabler-message-circle-2"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
                                </svg>
                                {{ $discussion->comments->count() }} comments
                            </div>

                            <div class="flex items-center justify-center gap-x-1">
                                <svg class="icon icon-tabler icon-tabler-heart @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) hidden @endif"
                                     id="like-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                    </path>
                                </svg>
                                <svg class="icon icon-tabler icon-tabler-heart-filled @if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() == 0) hidden @endif"
                                     id="unlike-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z"
                                          stroke-width="0" fill="currentColor"></path>
                                </svg>

                                <span id="like-count">{{ $discussion->likes->count() }}</span> likes
                            </div>

                            <form id="unlike-form"
                                  action="/like/delete/@if ($discussion->likes->where('user_id', '=', auth()->user()->id)->count() > 0) {{ $discussion->likes->where('user_id', '=', auth()->user()->id)->first()->id }} @endif"
                                  method="POST" hidden>
                                @csrf
                                <input id="discussion_thread_id_input" name="discussion_thread_id" type="text"
                                       value="{{ $discussion->id }}" hidden>
                                <input id="user_id_input" name="user_id" type="text" value="{{ auth()->user()->id }}"
                                       hidden>
                            </form>

                            <form id="like-form" action="{{ route('like.store') }}" hidden>
                                @csrf
                                <input id="discussion_thread_id_input" name="discussion_thread_id" type="text"
                                       value="{{ $discussion->id }}" hidden>
                                <input id="user_id_input" name="user_id" type="text"
                                       value="{{ auth()->user()->id }}" hidden>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex flex-col gap-y-2 rounded-lg bg-slate-200 py-4 px-6">
                <h4 class="font-semibold">Tambahkan Komentar Anda:</h4>
                <!-- Comment form -->
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <input name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                    <input name="discussion_thread_id" type="hidden" value="{{ $discussion->id }}">
                    <textarea class="w-full rounded-lg p-2" name="body" rows="4" placeholder="Tambahkan komentar" required></textarea>
                    <button class="mt-2 rounded bg-orange py-2 px-4 font-bold text-white hover:bg-orange/80"
                            type="submit">
                        Unggah Komentar
                    </button>
                </form>

                <!-- Display existing comments -->
            </div>
            <div class="mt-4 flex flex-col gap-y-2 rounded-lg bg-slate-200 py-4 px-6">
                @foreach ($discussion->comments as $comment)
                    <div class="mt-2 rounded-lg bg-gray-300 p-4">
                        <span class="text-xl text-gray-600">{{ $comment->user->username }}</span>
                        <p>{{ $comment->body }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
            crossorigin="anonymous"></script>
    <script>
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
            // Get the necessary elements
            const likeButton = $('#like-button');
            const unlikeButton = $('#unlike-button');
            const likeForm = $('#like-form');
            const unlikeForm = $('#unlike-form');

            // Add the click event handler to the like button
            likeButton.on('click', async function() {
                // Check if the discussion thread is already liked or unliked

                // Like the discussion thread
                try {
                    const response = await $.post(likeForm.attr('action'), likeForm.serialize());

                    // Update UI for liking
                    likeButton.addClass('liked');
                    likeButton.addClass('hidden');
                    unlikeButton.removeClass('hidden');
                    let likeCountElement = $('#like-count');
                    let currentLikeCount = parseInt(likeCountElement.text());
                    likeCountElement.text(currentLikeCount + 1);

                    // Set the like ID for unliking
                    $('#like_id_input').val(response.like_id);

                    // Update the action attribute of the unlike form with the newly created like ID
                    unlikeForm.attr('action', '/like/delete/' +
                        response.like_id);

                    // Show the unlike form
                    unlikeForm.show();
                } catch (error) {
                    console.error('An error occurred:', error);
                }

            });

            unlikeButton.on('click', async function() {
                try {
                    const response = await $.ajax({
                        url: unlikeForm.attr('action'),
                        type: 'POST',
                        data: unlikeForm.serialize(),
                    });

                    // Update UI for unliking
                    likeButton.removeClass('liked');
                    unlikeButton.addClass('hidden');
                    likeButton.removeClass('hidden');
                    let likeCountElement = $('#like-count');
                    let currentLikeCount = parseInt(likeCountElement.text());
                    likeCountElement.text(currentLikeCount - 1);

                    // Remove the unlike form from the DOM
                } catch (error) {
                    console.error('An error occurred:', error);
                }
            });
        });
    </script>
@endsection
