<?php

namespace App;

class Book
{
    private static $nextId = 1;
    private $id;
    private $title;
    private $authors = [];
    private $publisher;
    private $year;

    public function __construct()
    {
        $this->id = self::$nextId++;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setAuthors(array $authors)
    {
        $this->authors = $authors;
        return $this;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    public function __toString()
    {
        $str = "Id: " . $this->id . "\n";
        $str .= "Название: " . $this->title . "\n";
        foreach ($this->authors as $i => $author) {
            $str .= "Автор" . ($i + 1) . ": " . $author . "\n";
        }
        $str .= "Издательство: " . $this->publisher . "\n";
        $str .= "Год: " . $this->year . "\n";
        return $str;
    }
}
