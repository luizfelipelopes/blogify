<?php

namespace App\Interfaces;

use App\Models\Post;
use App\Services\CreatePostService;

interface ImportPostInterface
{
    public function import(CreatePostService $createPostService, array $existentsItems): Post;
    public function getRandomId(array $existentsItems): int;
    public function getMaxItem(): int;
}
