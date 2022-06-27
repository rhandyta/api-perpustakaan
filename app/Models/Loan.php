<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $fillable = ['user_id', 'member_id', 'borrow_date', 'long_borrowed', 'description', 'status'];

    public function Member()
    {
        return $this->belongsTo(Member::class);
    }

    public function LoanDetail()
    {
        return $this->hasMany(DetailLoan::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function ReturnBook()
    {
        return $this->hasOne(ReturnBook::class);
    }
}
