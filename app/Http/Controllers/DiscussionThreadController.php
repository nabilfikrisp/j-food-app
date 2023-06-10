<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Thread_Image;
use Illuminate\Http\Request;
use App\Models\Forum_Category;
use App\Models\Discussion_Thread;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDiscussion_ThreadRequest;
use App\Http\Requests\UpdateDiscussion_ThreadRequest;

class DiscussionThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussions = Discussion_Thread::orderBy('created_at', 'desc')->paginate(10);
        $trendingCategories = Discussion_Thread::select('forum_category_id', DB::raw('COUNT(*) as count'))
            ->groupBy('forum_category_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $trendingCategoryIds = $trendingCategories->pluck('forum_category_id')->toArray();

        $trending = Forum_Category::whereIn('id', $trendingCategoryIds)
            ->orderByRaw("FIELD(id, " . implode(',', $trendingCategoryIds) . ")")
            ->get();

        $mostLikedDiscussions = Like::select('discussion_thread_id', DB::raw('COUNT(*) as likes_count'))
            ->groupBy('discussion_thread_id')
            ->orderByDesc('likes_count')
            ->take(2)
            ->get();

        $mostLikedDiscussionIds = $mostLikedDiscussions->pluck('discussion_thread_id')->toArray();
        $mostLikedDiscussionsData = Discussion_Thread::whereIn('id', $mostLikedDiscussionIds)
            ->get()
            ->sortBy(function ($discussion) use ($mostLikedDiscussions) {
                $likedDiscussion = $mostLikedDiscussions->firstWhere('discussion_thread_id', $discussion->id);
                return $likedDiscussion ? $likedDiscussion->likes_count : 0;
            })
            ->values();

        $mostLikedDiscussionsData = $mostLikedDiscussionsData->sortByDesc(function ($discussion) use ($mostLikedDiscussions) {
            $likedDiscussion = $mostLikedDiscussions->firstWhere('discussion_thread_id', $discussion->id);
            return $likedDiscussion ? $likedDiscussion->likes_count : 0;
        })->values();


        // dd($mostLikedDiscussionIds);

        return view('discussion.index', ['discussions' => $discussions, 'trending' => $trending, 'mostLiked' => $mostLikedDiscussionsData]);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');

        $forumCategory = null;
        if (strpos($searchQuery, '#') === 0) {
            // Remove the "#" symbol from the search query
            $forumCategory = substr($searchQuery, 1);
        }

        $query = Discussion_Thread::query();

        if ($forumCategory) {
            // Search by forum category if the search query starts with "#"
            $query->whereHas('forumCategory', function ($query) use ($forumCategory) {
                $query->where('name', 'like', $forumCategory);
            });
        } else {
            // Search by title or body if the search query doesn't start with "#"
            $query->where(function ($query) use ($searchQuery) {
                $query->where('title', 'like', "%$searchQuery%")
                    ->orWhere('body', 'like', "%$searchQuery%");
            });
        }

        $discussions = $query->paginate(10);

        $trendingCategories = Discussion_Thread::select('forum_category_id', DB::raw('COUNT(*) as count'))
            ->groupBy('forum_category_id')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $trendingCategoryIds = $trendingCategories->pluck('forum_category_id')->toArray();

        $trending = Forum_Category::whereIn('id', $trendingCategoryIds)
            ->orderByRaw("FIELD(id, " . implode(',', $trendingCategoryIds) . ")")
            ->get();

        return view('discussion.index', ['discussions' => $discussions, 'trending' => $trending]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscussion_ThreadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'forum_category' => 'nullable|string|max:20',
        ], [
            'title.required' => 'Kolom judul harus diisi.',
            'title.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'content.required' => 'Kolom diskusi harus diisi.',
            'images.array' => 'Gambar harus berupa array.',
            'images.*.image' => 'Gambar harus berupa file gambar.',
            'images.*.mimes' => 'Gambar harus memiliki format: jpeg, png, jpg, gif.',
            'images.*.max' => 'Ukuran gambar tidak boleh lebih dari :max kilobita.',
            'forum_category.string' => 'Hashtag harus berupa teks.',
            'forum_category.max' => 'Hashtag tidak boleh lebih dari :max karakter.',
        ]);

        if ($request->hasFile('images') && count($request->file('images')) > 5) {
            return redirect()->back()->with('error', 'Mohon tidak mengunggah lebih dari 5 file.');
        }

        // Check if any of the uploaded images are too large
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->getSize() > 2048000) {
                    return redirect()->back()->with('error', 'Ukuran foto terlalu besar, maksimal 2Mb');
                }
            }
        }

        $discussionThread = new Discussion_Thread();
        $discussionThread->user_id = $request->input('user_id');
        $discussionThread->title = $request->input('title');
        $discussionThread->body = $request->input('content');

        if ($request->has('forum_category')) {
            $forumCategoryName = $request->input('forum_category');

            $forumCategoryName = ltrim($forumCategoryName, '#');

            $forumCategory = Forum_Category::where('name', $forumCategoryName)->first();

            if ($forumCategory) {
                $discussionThread->forum_category_id = $forumCategory->id;
            } else {
                $newForumCategory = new Forum_Category();
                $newForumCategory->name = $forumCategoryName;
                $newForumCategory->save();

                $discussionThread->forum_category_id = $newForumCategory->id;
            }
        }

        // Save the discussion thread
        $discussionThread->save();

        // Process and save the images if present
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('thread_images', 'public');
                $reviewImage = new Thread_Image();
                $reviewImage->discussion_thread_id = $discussionThread->id;
                $reviewImage->url = $imagePath;
                $reviewImage->save();
            }
        }

        // Redirect or do something else
        return redirect()->back()->with('success', 'Diskusi berhasil diunggah :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion_Thread  $discussion_Thread
     * @return \Illuminate\Http\Response
     */
    public function show($discussion_Thread)
    {
        $discussion = Discussion_Thread::find($discussion_Thread);
        // dd($discussion->likes);
        return view('discussion.show', ['discussion' => $discussion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discussion_Thread  $discussion_Thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion_Thread $discussion_Thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscussion_ThreadRequest  $request
     * @param  \App\Models\Discussion_Thread  $discussion_Thread
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscussion_ThreadRequest $request, Discussion_Thread $discussion_Thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discussion_Thread  $discussion_Thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion_Thread $discussion_Thread)
    {
        //
    }
}
