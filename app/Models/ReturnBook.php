<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnBook extends Model
{
    use HasFactory;
    protected $table = 'returns';
    protected $fillable = ['loan_id', 'user_id', 'date_return'];
    protected $hidden = ['created_at', 'updated_at'];

    public function Loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
