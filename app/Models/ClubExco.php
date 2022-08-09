<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubExco extends Model
{
    use HasFactory;

    protected $fillable = [
        'position','user_id','membership_club_id'
    ];
}
