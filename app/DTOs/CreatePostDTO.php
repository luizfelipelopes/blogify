<?php

namespace App\DTOs;

class CreatePostDTO
{
    public string $title;
    public string $content;
    public string $status;
    public string $source;
    public int $external_id;

    public function __construct(string $title, string $content, string $status, string $source, int $externalId)
    {
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->source = $source;
        $this->external_id = $externalId;
    }
}
