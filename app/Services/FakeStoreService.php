<?php

namespace App\Services;

use App\DTOs\CreatePostDTO;
use App\Interfaces\ImportPostInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class FakeStoreService implements ImportPostInterface
{
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
        
        $content = "{$dataResponse['description']}\n 
        Price: {$dataResponse['price']}\n 
        Category: {$dataResponse['category']}\n 
        Rate: rate: {$dataResponse['rating']['rate']} / count: {$dataResponse['rating']['count']}";

        $data = new CreatePostDTO(
            title: $dataResponse['title'],
            content: $content,
            status: 'draft',
            source: 'FakeStore',
            externalId: $dataResponse['id'],
        );

        $result = $createPostService->execute($data);

        return $result;

    }

    public function getRandomId(array $existentsItems): int
    {
        $maxItem = $this->getMaxItem();

        do {
            $randomId = rand(1, $maxItem);
        } while (in_array($randomId, $existentsItems));

        return $randomId;
    }

    public function getMaxItem(): int
    {
        $response = Http::get("{$this->baseUrl}");
        $total = count($response->json());

        return $total;
        
    }
}
