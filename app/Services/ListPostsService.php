<?php

namespace App\Services;

use App\Models\Post;

class ListPostsService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function execute(string $type)
    {

        $operator = $type == 'blog' ? 'JSONPlaceholder' : 'FakeStore';

        $result = Post::where('source', $operator)
        ->pluck('external_id')
        ->toArray();

        return $result;
    }
}
