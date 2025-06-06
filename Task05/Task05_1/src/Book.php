<?php

namespace App;

class Book
{
    private int $id;
    private string $title;
    private string $author;

    public function __construct(int $id, string $title, string $author)
    {
        $this->id     = $id;
        $this->title  = $title;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
