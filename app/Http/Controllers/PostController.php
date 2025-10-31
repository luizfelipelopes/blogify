<?php

namespace App\Http\Controllers;

use App\DTOs\UpdatePostDTO;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\CreatePostService;
use App\Services\DeletePostService;
use App\Services\ImportPostService;
use App\Services\ListPostsService;
use App\Services\UpdatePostService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(
        protected ListPostsService $listPostsService,
        protected CreatePostService $createPostService,
        protected UpdatePostService $updatePostService,
        protected DeletePostService $deletePostService,
        protected ImportPostService $importPostService,
        )
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
        
        $this->importPostService->execute($this->createPostService, $existentItems);

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
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        
        $postDTO = new UpdatePostDTO(
            title: $data['title'],
            content: $data['content'],
            status: $data['status'],
        );
        
        $this->updatePostService->execute($postDTO, $post);

        return redirect()->route('posts.show', $post)
        ->with('success', 'Post updated successfully!');
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
