<?php

namespace App\Http\Controllers;

use App\Models\Discussion_Thread;
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
     * @param  \App\Http\Requests\StoreDiscussion_ThreadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscussion_ThreadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion_Thread  $discussion_Thread
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion_Thread $discussion_Thread)
    {
        //
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
