<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'biography',
        'country',
        'email',
        'website',
        'image_paths',
    ];



    protected $casts = [
        'image_paths' => 'array',  // this tells Laravel to auto JSON encode/decode
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // app/Models/Author.php

    public function getProfileImageAttribute()
    {
        $images = json_decode($this->image_paths, true);
        return $images[0] ?? null;
    }

    public function getCoverImageAttribute()
    {
        $images = json_decode($this->image_paths, true);
        return $images[1] ?? null;
    }
}
