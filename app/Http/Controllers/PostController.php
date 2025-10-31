<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\CreatePostService;
use App\Services\DeletePostService;
use App\Services\FakeStoreService;
use App\Services\JsonPlaceHolderService;
use App\Services\ListPostsService;
use App\Services\UpdatePostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(
        protected ListPostsService $listPostsService,
        protected CreatePostService $createPostService,
        protected UpdatePostService $updatePostService,
        protected DeletePostService $deletePostService)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->listPostsService->execute();
        return view('posts.index', ['posts' => $posts]);
    }

    public function import(Request $request)
    {
        
        $type = $request->type;
        $existentItems = $this->listPostsService->execute('externalId', $type);

        if($type == 'blog') {
            $service  = new JsonPlaceHolderService();
        } else {
            $service  = new FakeStoreService();
        }
        
        $service->import($this->createPostService, $existentItems);

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
        $data = $request->all();
        $result = $this->updatePostService->execute($data, $post);

        return view('posts.single', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $this->deletePostService->execute($post);
        return redirect()->route('posts.index');

    }
}
