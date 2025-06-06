<?php

namespace App;

class BooksList implements \Iterator
{
    private array $books = [];
    private int $position = 0;

    public function add(Book $book): void
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

    public function store(string $fileName): void
    {
        $serialized = serialize($this->books);
        file_put_contents($fileName, $serialized);
    }

    public function load(string $fileName): void
    {
        if (file_exists($fileName)) {
            $serialized = file_get_contents($fileName);
            $this->books = unserialize($serialized);
        } else {
            $this->books = [];
        }
    }


    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): Book
    {
        return $this->books[$this->position];
    }

    public function key(): int
    {
        return $this->books[$this->position]->getId();
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->position]);
    }
}
