<?php

namespace App\Http\Controllers;

use App\Models\Forum_Category;
use App\Http\Requests\StoreForum_CategoryRequest;
use App\Http\Requests\UpdateForum_CategoryRequest;

class ForumCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreForum_CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForum_CategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum_Category  $forum_Category
     * @return \Illuminate\Http\Response
     */
    public function show(Forum_Category $forum_Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum_Category  $forum_Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum_Category $forum_Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForum_CategoryRequest  $request
     * @param  \App\Models\Forum_Category  $forum_Category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForum_CategoryRequest $request, Forum_Category $forum_Category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum_Category  $forum_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum_Category $forum_Category)
    {
        //
    }
}
