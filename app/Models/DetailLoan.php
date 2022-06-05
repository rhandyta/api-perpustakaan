<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLoan extends Model
{
    use HasFactory;
    protected $table = 'loan_details';
    protected $fillable = ['loan_id', 'book_id', 'total'];
    protected $hidden = ['created_at', 'updated_at'];

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }

    public function Loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
