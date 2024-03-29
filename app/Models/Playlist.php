<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        "uuid",
        "user_id",
        "title",
        "name",
        "email",
        "admin",
        'password',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'uuid';
    }

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class)->withTimestamps();
    }
}

