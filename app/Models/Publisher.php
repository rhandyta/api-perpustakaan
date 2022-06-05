<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $table = 'publishers';
    protected $fillable = ['publisher_code', 'publisher_name', 'slug'];
    protected $hidden = ['created_at', 'updated_at'];

    public function Book()
    {
        return $this->hasMany(Book::class);
    }
}
