<?php

namespace App\Services;

use App\Models\Post;

class CreatePostService
{
    /**
     * Create a new class instance.
     */
    public function __construct(){}

    public function execute(array $data)
    {
        $result = Post::create($data);

        return $result;
    }
}
