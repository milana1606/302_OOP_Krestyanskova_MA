<?php

namespace App;

class BooksList
{
    private $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        return $this->books[$n];
    }

    public function store(string $fileName)
    {
        $serialized = serialize($this->books);
        file_put_contents($fileName, $serialized);
    }

    public function load(string $fileName)
    {
        if (file_exists($fileName)) {
            $serialized = file_get_contents($fileName);
            $this->books = unserialize($serialized);
        } else {
            $this->books = [];
        }
    }
}
