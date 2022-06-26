<?php
namespace App\Repositories;

use App\Interfaces\BookInterface;
use App\Models\Book;

class BookRepository implements BookInterface {

    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        $book = $this->book::with('category', 'publisher')
            ->orderBy('created_at', 'DESC')
            ->paginate(25);
        return $book;
    }

    public function store($data)
    {
        $book = $this->book::create($data);
        return $book;
    }

    public function show($id)
    {
        $book = $this->book::where('id', $id)
            ->orWhere('slug', $id)
            ->with('category', 'publisher')
            ->get();
        return $book;
    }

    public function update($id, $data)
    {
        $book = $this->book::findOrFail($id);
        $book->fill($data);
        $book->save();
        return $book;
    }

    public function destroy($data)
    {
        $book = $this->book::destroy(collect($data));
        return $book;
    }

    public function bookDetail($id)
    {
        $book = $this->book::where('id', '=', $id)
            ->select('stock', 'id')
            ->first();
        return $book;
    }

    public function decrementStock($id, $data)
    {
        $book = $this->book::findOrFail($id);
        $book->decrement('stock', $data);
        return $book;
    }

    public function incrementStock($id, $data)
    {
        $book = $this->book::findOrFail($id);
        $book->increment('stock', $data);
        return $book;
    }

}