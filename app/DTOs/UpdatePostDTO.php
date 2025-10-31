<?php

namespace App\DTOs;

class UpdatePostDTO
{
    public string $title;
    public string $content;
    public string $status;

    public function __construct(string $title, string $content, string $status)
    {
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
    }
}
