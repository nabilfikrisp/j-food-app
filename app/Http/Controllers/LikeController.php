<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Discussion_Thread;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->user_id;
        $discussionThreadId = $request->discussion_thread_id;

        // Check if a like with the same user and discussion thread combination already exists
        $existingLike = Like::where('user_id', $userId)
            ->where('discussion_thread_id', $discussionThreadId)
            ->first();
        $discussionThreadCount = Discussion_Thread::find($discussionThreadId)->likes->count();
        if ($existingLike) {
            // Like already exists, do not create a new record
            return response()->json(['like_id' => $existingLike->id, 'like_count' => $discussionThreadCount, 'message' => 'Like already exists'], 200);
        }

        // Create a new like record
        $like = new Like();
        $like->user_id = $userId;
        $like->discussion_thread_id = $discussionThreadId;
        $like->save();

        // Return the newly created like ID
        return response()->json(['like_id' => $like->id, 'like_count' => $discussionThreadCount], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLikeRequest  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $like = Like::findOrFail($id);

            $like->delete();
            $max = DB::table('likes')->max('id') + 1;
            DB::statement("ALTER TABLE likes AUTO_INCREMENT =  $max");

            return response()->json([
                'message' => 'Like deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete like',
            ], 500);
        }
    }
}
