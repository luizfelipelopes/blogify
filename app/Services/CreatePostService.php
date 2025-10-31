<?php

namespace App\Services;

use App\DTOs\CreatePostDTO;
use App\Models\Post;

class CreatePostService
{
    /**
     * Create a new class instance.
     */
    public function __construct(){}

    public function execute(CreatePostDTO $data): Post
    {
        $result = Post::create((array) $data);

        return $result;
    }
}
