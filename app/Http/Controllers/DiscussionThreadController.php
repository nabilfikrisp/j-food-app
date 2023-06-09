<?php

namespace App\Http\Controllers;

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
            'title' => 'required',
            'content' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'forum_category' => 'nullable|string',
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

        // Create a new discussion thread
        $discussionThread = new Discussion_Thread();
        $discussionThread->user_id = $request->input('user_id');
        $discussionThread->title = $request->input('title');
        $discussionThread->body = $request->input('content');

        // Associate forum_category (hashtag) with the discussion thread
        if ($request->has('forum_category')) {
            $forumCategoryName = $request->input('forum_category');

            // Check if the forum category (hashtag) already exists
            $forumCategory = Forum_Category::where('name', $forumCategoryName)->first();

            if ($forumCategory) {
                // Associate the existing forum category with the discussion thread
                $discussionThread->forum_category_id = $forumCategory->id;
            } else {
                // Create a new forum category (hashtag) if it doesn't exist
                $newForumCategory = new Forum_Category();
                $newForumCategory->name = $forumCategoryName;
                $newForumCategory->save();

                // Associate the new forum category with the discussion thread
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
        return redirect()->back()->with('success', 'Discussion thread created successfully!');
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
