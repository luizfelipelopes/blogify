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


    public function execute()
    {
        $result = Post::where('source', 'JSONPlaceholder')
        ->pluck('external_id')
        ->toArray();

        return $result;
    }
}
