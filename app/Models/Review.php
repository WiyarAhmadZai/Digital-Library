<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'book_id',
        'user_name',
        'user_email',
        'comment',
        'rating',
        'parent_id',  // add this
    ];

    // A review belongs to a book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Replies to this review
    public function replies()
    {
        return $this->hasMany(Review::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    // Parent review if this is a reply
    public function parent()
    {
        return $this->belongsTo(Review::class, 'parent_id');
    }
}
