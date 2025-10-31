<?php

namespace App\Services;

use App\DTOs\UpdatePostDTO;
use App\Models\Post;

class UpdatePostService
{
    public function execute(UpdatePostDTO $data, Post $post): bool
    {
        $result = $post->update((array) $data);
        return $result;
    }
}
