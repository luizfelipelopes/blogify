<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class JsonPlaceHolderService
{
    /**
     * Create a new class instance.
     */
    
    private $baseUrl = 'https://jsonplaceholder.typicode.com/posts';
    public function __construct(){}


    public function import(CreatePostService $createPostService, array $existentsItems): Post
    {
        
        $randomId = $this->getRandomId($existentsItems);

        $response = Http::get("{$this->baseUrl}/$randomId");    
        $dataResponse = $response->json();

        $data = [
            'title' => $dataResponse['title'],
            'content' => $dataResponse['body'],
            'status' => 'draft',
            'source' => 'JSONPlaceholder', 
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
        } while (in_array($maxItem, $existentsItems));

        return $randomId;
    }

    private function getMaxItem(): int
    {
        $response = Http::get($this->baseUrl);
        $total = count($response->json());

        return $total;
        
    }

}