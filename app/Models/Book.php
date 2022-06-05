<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['category_id', 'publisher_id', 'book_code', 'title', 'isbn', 'author', 'synopsis', 'numberofpages', 'stock', 'publication_year', 'slug'];
    protected $hidden = ['created_at', 'updated_at'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function LoanDetail()
    {
        return $this->hasMany(DetailLoan::class);
    }
}
