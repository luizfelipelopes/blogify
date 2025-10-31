<?php

namespace App\Services;

use App\Models\Post;

class DeletePostService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(Post $post): bool|null
    {
        $result = $post->delete();

        return $result;
    }
}
