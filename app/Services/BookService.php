<?php
namespace App\Services;

use App\Interfaces\BookInterface;

class BookService {

    protected $book;

    public function __construct(BookInterface $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $book = $this->book->index();
        if(!$book->isEmpty()){
            return $book;
        }
        return 'Data not found';
    }

    public function store($data)
    {
        $data['slug'] = \Str::slug($data['title']);
        $data['book_code'] = \Str::uuid()->toString();
        $book = $this->book->store($data);
        return $book;
    }

    public function show($id)
    {
        $book = $this->book->show($id);
        if(!$book->isEmpty()){
            return $book;
        }
        return $book;
    }

    public function update($id, $data)
    {
        $book = $this->book->update($id, $data);
        return $book;
    }

    public function destroy($data)
    {
        $books = [];
        foreach($data as $bookId) {
            array_push($books, $bookId);
        }
        $book = $this->book->destroy($books);
        if($book > 0 ){
            return 'Data has been deleted';
        }
        return 'Data not found';
    }

    public function decrementStock($id, $data)
    {
        $book = $this->book->decrementStock($id, $data);
        return $book;
    }

}