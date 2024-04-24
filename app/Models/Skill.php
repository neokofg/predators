<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'skills';

    protected $guarded = [
        'id'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }
}
