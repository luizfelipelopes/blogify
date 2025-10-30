<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\CreatePostService;
use App\Services\JsonPlaceHolderService;
use App\Services\ListPostsService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    public function import(CreatePostService $createPostService, ListPostsService $listPostsService)
    {
        $existentItems = $listPostsService->execute();

        $service  = new JsonPlaceHolderService();
        $service->import($createPostService, $existentItems);

        return view('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
