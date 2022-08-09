<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','membership_club_id','profile_pics','display_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
