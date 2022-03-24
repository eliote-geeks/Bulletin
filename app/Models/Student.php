<?php

namespace App\Models;

use App\Models\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    public function note()
    {
        return $this->hasOne(Note::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
