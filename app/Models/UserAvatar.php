<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAvatar extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'user_avatars';
    protected $guarded = [
        'id'
    ];
}
