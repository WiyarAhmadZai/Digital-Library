<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['book_id', 'user_name', 'user_email', 'rating', 'comment'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
