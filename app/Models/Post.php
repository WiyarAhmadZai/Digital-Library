<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //
    use HasFactory;
    protected $fillable = ['user_id', 'body', 'images', 'pdfs', 'visibility'];

    protected $casts = [
        'images' => 'array',
        'pdfs' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
