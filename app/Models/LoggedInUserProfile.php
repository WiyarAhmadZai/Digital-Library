<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoggedInUserProfile extends Model
{
    //

    protected $fillable = [
        'user_id',
        'last_name',
        'phone_number',
        'profile_image',
        'cover_image',
        'purchased_books',
    ];

    protected $casts = [
        'purchased_books' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
