<?php

class Book {
    
    private $title;
    private $author;
    private $year;
    private $isBorrowed;

    public function __construct($title, $author, $year, $isBorrowed = false) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->isBorrowed = $isBorrowed;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function isBorrowed() {
        return $this->isBorrowed;
    }

    public function setBorrowed($borrowed) {
        $this->isBorrowed = $borrowed;
    }
}


class Library {
    
    private $books = [];

    
    public function __construct() {
        
    }
  
    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function borrowBook(Book $book) {
        if ($book->isBorrowed()) {
            echo "Buku ini telah di pinjam.\n";
        } else {
            $book->setBorrowed(true);
            echo "Anda telah meminjam buku " . $book->getTitle() . ".\n";
        }
    }

    public function returnBook(Book $book) {
        if (!$book->isBorrowed()) {
            echo "Buku ini belum dipinjam.\n";
        } else {
            $book->setBorrowed(false);
            echo "Anda belum mengembalikan buku " . $book->getTitle() . ".\n";
        }
    }

    public function printAvailableBooks() {
        echo "Buku yang tersedia:\n";
        foreach ($this->books as $book) {
            if (!$book->isBorrowed()) {
                echo "- " . $book->getTitle() . " oleh " . $book->getAuthor() . " (" . $book->getYear() . ")\n";
            }
        }
    }
}

$library = new Library();

$book1 = new Book("Three Act Tragedy", "Agatha Christie", 1995);
$book2 = new Book("Algoritma & Pemrograman menggunakan Java", "Abdul Kadir", 2012);

$library->addBook($book1);
$library->addBook($book2);

$library->borrowBook($book1);
$library->printAvailableBooks();

$library->returnBook($book1);
$library->printAvailableBooks();
