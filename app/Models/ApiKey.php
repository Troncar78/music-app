<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = [
        "uuid",
        "user_id",
        "title",
        "name",
        "key",
        "email",
        "admin",
        'password',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
