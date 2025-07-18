<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile'; // singular table name as per migration

    protected $fillable = [
        'user_id',
        'last_name',
        'profile_image',
        'cover_image',
        'biography',
        'phone_number',
        'purchased_books',
        'profession',
    ];

    protected $casts = [
        'purchased_books' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
