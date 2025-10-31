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

    public function __construct(protected ListPostsService $listPostsService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->listPostsService->execute();
        return view('posts.index', ['posts' => $posts]);
    }

    public function import(Request $request, CreatePostService $createPostService)
    {
        
        $type = $request->type;
        $existentItems = $this->listPostsService->execute('externalId', $type);

        if($type == 'blog') {
            $service  = new JsonPlaceHolderService();
        } else {
            $service  = new FakeStoreService();
        }
        
        $service->import($createPostService, $existentItems);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.single', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
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
