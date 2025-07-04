<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profile';

    protected $fillable = [
        'user_id',
        'last_name',
        'profile_image',
        'biography',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
