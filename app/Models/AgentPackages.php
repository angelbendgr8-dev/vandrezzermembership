<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentPackages extends Model
{
    use HasFactory;

    protected $fillable = [
        'locale','name','price',
    ];
}
