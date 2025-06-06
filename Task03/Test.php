<?php

use App\Book;
use App\BooksList;

function runTest()
{
    $book1 = new Book();
    $book1->setTitle("PHP forever")
          ->setAuthors(["Gates B.", "Smith J."])
          ->setPublisher("O'Reily")
          ->setYear(2020);
    echo "Книга 1:\n" . $book1;
    echo "ID книги 1: " . $book1->getId() . "\n\n";

    $book2 = new Book();
    $book2->setTitle("Java in action")
          ->setAuthors(["Johnson M."])
          ->setPublisher("Pearson")
          ->setYear(2019);
    echo "Книга 2:\n" . $book2;
    echo "ID книги 2: " . $book2->getId() . "\n\n";

    $list = new BooksList();
    $list->add($book1);
    $list->add($book2);
    echo "Количество книг: " . $list->count() . "\n";
    echo "Первая книга:\n" . $list->get(0);
    echo "Вторая книга:\n" . $list->get(1);

    $list->store("books.dat");

    $newList = new BooksList();
    $newList->load("books.dat");
    echo "\nЗагруженные книги:\n";
    echo "Количество книг: " . $newList->count() . "\n";
    echo "Первая книга:\n" . $newList->get(0);
    echo "Вторая книга:\n" . $newList->get(1);
}
