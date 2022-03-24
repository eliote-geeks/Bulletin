<?php

namespace App\Models;

use App\Models\User;
use App\Models\Semestry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ue extends Model
{
    use HasFactory;

    public function semestry()
    {
        return $this->belongsTo(Semestry::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
