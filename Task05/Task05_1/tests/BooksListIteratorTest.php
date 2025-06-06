<?php


use PHPUnit\Framework\TestCase;
use App\Book;
use App\BooksList;


class BooksListIteratorTest extends TestCase
{
    public function testIterator(): void
{
    $book1 = new Book(1, "Мяу", "Гав");
    $book2 = new Book(2, "Приключение Котика", "Странствия Собаки");
    $book3 = new Book(3, "Название 3", "Автор 3");

    $booksList = new BooksList();
    $booksList->add($book1);
    $booksList->add($book2);
    $booksList->add($book3);

    $expectedKeys   = [1, 2, 3];
    $expectedTitles = ["Мяу", "Гав", "Название 3"];

    $index = 0;
    foreach ($booksList as $key => $book) {
        echo "Checking key: $key, Title: " . $book->getTitle() . "\n"; // Вывод в консоль
        $this->assertEquals($expectedKeys[$index], $key);
        $this->assertEquals($expectedTitles[$index], $book->getTitle());
        $index++;
    }
    $this->assertEquals(3, $index);
}
}
