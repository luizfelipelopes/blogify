<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class FakeStoreService
{
    /**
     * Create a new class instance.
     */
    private readonly string $baseUrl;
    public function __construct()
    {
        $this->baseUrl = config('app.api_fake_store');
    }

    public function import(CreatePostService $createPostService, array $existentsItems): Post
    {
        
        $randomId = $this->getRandomId($existentsItems);

        $response = Http::get("{$this->baseUrl}/$randomId");    
        $dataResponse = $response->json();

        $data = [
            'title' => $dataResponse['title'],
            'content' => $dataResponse['description'],
            'status' => 'draft',
            'source' => 'FakeStore', 
            'external_id' => $dataResponse['id'], 
        ];

        $result = $createPostService->execute($data);

        return $result;

    }

    private function getRandomId(array $existentsItems): int
    {
        $maxItem = $this->getMaxItem();

        do {
            $randomId = rand(1, $maxItem);
        } while (in_array($randomId, $existentsItems));

        return $randomId;
    }

    private function getMaxItem(): int
    {
        $response = Http::get("{$this->baseUrl}");
        $total = count($response->json());

        return $total;
        
    }
}
