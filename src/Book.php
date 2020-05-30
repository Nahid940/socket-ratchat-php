<?php


namespace App;


class Book
{
    protected $bookName;

    public function getBookName($name)
    {
        return $this->bookName=$name;
    }

}