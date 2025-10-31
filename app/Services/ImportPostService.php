<?php

namespace App\Services;

use App\Interfaces\ImportPostInterface;
use App\Models\Post;

class ImportPostService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected ImportPostInterface $importPostInterface)
    {
        //
    }

    public function execute(CreatePostService $createPostService, array $existentItems): Post
    {
        $result = $this->importPostInterface->import($createPostService, $existentItems);

        return $result;
    }
}
