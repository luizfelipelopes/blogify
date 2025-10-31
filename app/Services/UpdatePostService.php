<?php

namespace App\Services;

use App\Models\Post;

class UpdatePostService
{
    public function execute(array $data, Post $post): bool
    {
        $result = $post->update($data);
        return $result;
    }
}
