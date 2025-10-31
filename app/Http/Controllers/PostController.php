<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\CreatePostService;
use App\Services\FakeStoreService;
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

    public function import(Request $request, CreatePostService $createPostService, ListPostsService $listPostsService)
    {
        
        $type = $request->type;
        $existentItems = $listPostsService->execute($type);

        if($type == 'blog') {
            $service  = new JsonPlaceHolderService();
        } else {
            $service  = new FakeStoreService();
        }
        
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
