<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class ListPostsService
{
    /**
     * Create a new class instance.
     */
    public function execute(string|null $mode = null, string|null $type = null): array|Collection
    {
        if($mode == 'externalId'){
            return $this->listExternalIds($type);
        }

        return $this->listAll();
    }

    public function listAll(): Collection
    {
        $result = Post::all();

        return $result;
    }

    public function listExternalIds(string $type): array
    {
        $operator = $type == 'blog' ? 'JSONPlaceholder' : 'FakeStore';

        $result = Post::where('source', $operator)
        ->pluck('external_id')
        ->toArray();

        return $result;
    }
}
